window.newsletter = function() {
  return {
    data: {
      email: '',
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

      if (this.data.email === 'success@email.com') {
        this.setSuccess('You have been subscribed. Please check your email to confirm.');
      } else if (this.data.email === 'alreadysubscribed@email.com') {
        this.setSuccess('You are already subscribed. Thank you!');
      } else {
        this.setError('We could not subscribe you. Please try again.');
      }

      this.reset();
    },
  };
};
