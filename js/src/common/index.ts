import app from 'flarum/common/app';

interface ICsrfResponse {
  data: {
    attributes: { token: string };
    id: number;
    type: 'csrf-keepalive-response';
  };
}

app.initializers.add('davwheat/session-keepalive', () => {
  setTimeout(() => {
    // attempt keep alive 4 times before session expiry
    const keepAliveInterval = (parseInt(app.forum.attribute('sessionLifetimeMins')) * 60 * 1000) / 4;

    // POST to keep session token alive
    (window as any).__davwheat_csrf_auto_keepalive_interval = setInterval(() => {
      app
        .request<ICsrfResponse>({ url: app.forum.attribute('apiUrl') + '/csrf-keepalive', method: 'POST' })
        .then((response) => {
          const csrfToken = response.data.attributes.token;

          app.session.csrfToken = csrfToken;
        })
        .catch((e) => {
          console.group(`[davwheat/session-keepalive] Failed to keep CSRF token alive.`);
          console.error(e);
          console.groupEnd();
        });
    }, keepAliveInterval);
  }, 0);
});
