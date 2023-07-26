<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

    $query = mysqli_query($connection, "SELECT id, subject_name FROM subject_info") or die('query failed');

    $subject = array();

    if (mysqli_num_rows($query) > 0) {
        while ($fetch_subject = mysqli_fetch_assoc($query)) {
            $subject[] = $fetch_subject;
        }
    }

    file_put_contents('json/subject_data.php', '<?php $subjectData = ' . var_export($subject, true) . ';');

    header('Content-Type: application/json');
    echo json_encode($subject);

?>