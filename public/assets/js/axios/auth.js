const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  background: "rgba(0, 0, 0, 0.7)",
  color: "#fff",
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

document.querySelector('.login-form').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    axios.post(base_url + 'auth/login', formData)
        .then(res => {
            if (res.data.status === 'success') {
              window.location.href = base_url + 'dashboard';
            } else {
                Toast.fire({
                    icon: "error",
                    title: res.data.message
                });
            }
        })
        .catch(err => {
             Toast.fire({
                icon: "error",
                title: res.data.message
            });
        });
});
