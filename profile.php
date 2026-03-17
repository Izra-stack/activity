<?php
$fullname = $age = $course = $email = $gender = $hobby_list = $bio = "";
$display_image = "uploads/default.png";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'] ?? 'N/A';
    $age      = $_POST['age']      ?? 'N/A';
    $course   = $_POST['course']   ?? 'N/A';
    $email    = $_POST['email']    ?? 'N/A';
    $gender   = $_POST['gender']   ?? 'N/A';
    $bio      = $_POST['bio']      ?? 'No bio provided.';

    $hobbies    = $_POST['hobbies'] ?? [];
    $hobby_list = !empty($hobbies) ? implode(", ", $hobbies) : "None selected";

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $image_name = time() . "_" . basename($_FILES['profile_image']['name']);
        
        $upload_dir = __DIR__ . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $image_name)) {
            $display_image = "uploads/" . $image_name;
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile - Generated</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px; }
        .container {
            width: 400px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgb(131, 131, 131);
        }
        h2 { text-align: center; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        .profile-img {
            display: block;
            margin: 0 auto 20px auto;
            border-radius: 50%;
            border: 3px solid #3498db;
            width: 150px;
            height: 150px;
            object-fit: cover;
            background-color: #f0f0f0;
        }
        .row { display: flex; gap: 20px; }
        .col { flex: 1; }
        .label { font-weight: bold; color: #555; font-size: 13px; display: block; margin-top: 10px; }
        .data { margin-bottom: 10px; color: #333; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .bio-box {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            border-left: 4px solid #3498db;
            margin-top: 5px;
            white-space: pre-wrap;
        }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #3498db; text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Generated Profile</h2>

    <img src="<?php echo $display_image; ?>" class="profile-img" alt="Profile Image">

    <span class="label">Full Name:</span>
    <div class="data"><?php echo htmlspecialchars($fullname); ?></div>

    <div class="row">
        <div class="col">
            <span class="label">Age:</span>
            <div class="data"><?php echo htmlspecialchars($age); ?></div>
        </div>
        <div class="col">
            <span class="label">Course:</span>
            <div class="data"><?php echo htmlspecialchars($course); ?></div>
        </div>
    </div>

    <span class="label">Email:</span>
    <div class="data"><?php echo htmlspecialchars($email); ?></div>

    <span class="label">Gender:</span>
    <div class="data"><?php echo htmlspecialchars($gender); ?></div>

    <span class="label">Hobbies:</span>
    <div class="data"><?php echo htmlspecialchars($hobby_list); ?></div>

    <span class="label">Biography:</span>
    <div class="bio-box"><?php echo nl2br(htmlspecialchars($bio)); ?></div>

    <a href="index.php" class="back-link">← Create Another</a>
</div>

</body>
</html>