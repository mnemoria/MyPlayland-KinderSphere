function redirectToLogin(userType) {
    let loginPage;
    if (userType === 'user') {
      loginPage = 'userlogin.php';
    } else if (userType === 'teacher') {
      loginPage = 'teacherlogin.php';
    } else {
      return;
    }
    window.location.href = loginPage;
  }
  