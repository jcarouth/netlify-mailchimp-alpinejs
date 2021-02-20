window.newsletter = function() {
  return {
    config: {
      endpoints: {
        subscribe: '/.netlify/functions/subscribe',
      },
    },
    data: {
      email: '',
      listId: '1234',
    },
    error: false,
    loading: false,
    message: '',
    reset() {
      this.loading = false;
      if (!this.error) {
        this.data.email = '';
      }
    },
    setError(message) {
      this.error = true;
      this.message = message;
    },
    setSuccess(message) {
      this.error = false;
      this.message = message;
    },
    submit() {
      this.loading = true;

      if (this.data.email === '') {
        this.setError('Please enter your email address.');
        this.loading = false;

        return false;
      }

      let self = this;

      fetch(this.config.endpoints.subscribe, {
        method: 'POST',
        body: JSON.stringify(this.data),
        headers: { 'Content-Type': 'application/json' }
      })
        .then(r => r.json())
        .then(data => {
          if (data.status === 'pending') {
            self.setSuccess('You have been subscribed. Please check your email to confirm.');
          } else if (data.status === 'subscribed') {
            self.setSuccess('You are already subscribed. Thank you!');
          } else {
            self.setError('We could not subscribe you. Please try again.');
          }
        })
        .catch(e => {
          self.setError('We could not subscribe you. Please try again.');
        })
        .finally(() => {
          self.reset();
        });
    },
  };
};
