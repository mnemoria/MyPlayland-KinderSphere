function redirectToLogin(userType) {
    let loginPage;
    if (userType === 'user') {
      loginPage = 'student_login.php';
    } else if (userType === 'teacher') {
      loginPage = 'teacher_login.php';
    } else {
      return;
    }
    window.location.href = loginPage;
  }

  function handleFormSubmission(event) {
    event.preventDefault(); 
    return false; 
}
  