<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
</head>
<body>
<h2>Add New Course</h2>
<form id="course-form" method="post">
    <label>Title:</label><br>
    <input type="text" name="title"><br><br>

    <label>Description:</label><br>
    <textarea name="description" ></textarea><br><br>

    <label>Hours:</label><br>
    <input type="number" name="hours" ><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" ><br><br>

    <button type="submit">Add Course</button>
</form>

<script>
    const form = document.getElementById('course-form');

    form.addEventListener('submit', function (e) {
        e.preventDefault();


        fetch('post_api.php', {
            method: 'POST',

            body: JSON.stringify({
                title: this.title.value,
                description: this.description.value,
                hours: this.hours.value,
                price: this.price.value
            }),

            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log(data.status);
                console.log(data.message);
            });
    });
</script>
</body>
</html>
