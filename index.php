<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgb(131, 131, 131);
        }
        h2 { text-align: center; color: #333; }
        .row { display: flex; gap: 30px; }
        .col { flex: 1; }
        
        input[type=text], input[type=number], input[type=email], textarea, input[type=file] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }
        textarea { resize: none; }

        .btn-group { display: flex; gap: 10px; margin-top: 10px; }
        input[type=submit] {
            flex: 2; padding: 10px; background-color: #3498db;
            border: none; color: white; font-size: 16px;
            border-radius: 5px; cursor: pointer;
        }
        input[type=reset] {
            flex: 1; padding: 10px; background-color: #e74c3c;
            border: none; color: white; font-size: 16px;
            border-radius: 5px; cursor: pointer;
        }
        input[type=submit]:hover { background-color: #2980b9; }
        input[type=reset]:hover { background-color: #c0392b; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Your Profile</h2>
    <form action="profile.php" method="POST" enctype="multipart/form-data">
        Full Name:<br>
        <input type="text" name="fullname" required>

        <div class="row">
            <div class="col">
                Age:<br>
                <input type="number" name="age" required>
            </div>
            <div class="col">
                Course / Program:<br>
                <input type="text" name="course" required>
            </div>
        </div>

        Email Address:<br>
        <input type="email" name="email" required>

        Gender:<br>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female
        <br><br>

        Hobbies:<br>
        <input type="checkbox" name="hobbies[]" value="Reading"> Reading<br>
        <input type="checkbox" name="hobbies[]" value="Gaming"> Gaming<br>
        <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br>
        <input type="checkbox" name="hobbies[]" value="Music"> Music<br>
        <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling<br>
        <input type="checkbox" name="hobbies[]" value="Coding"> Coding<br><br>

        Bio:<br>
        <textarea name="bio" rows="5"></textarea>

        Upload Profile Image:<br>
        <input type="file" name="profile_image" accept="image/*" required>

        <div class="btn-group">
            <input type="submit" value="Submit Profile">
            <input type="reset" value="Clear">
        </div>
    </form>
</div>

</body>
</html>