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
      this.data.email = '';
    },
    submit() {
      this.loading = !this.loading;
      this.message = 'You have been subscribed. Please check your email to confirm.'
    },
  };
};
