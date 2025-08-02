<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Courses_Fetch</title>
</head>
<body>
<table id="read" border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Hours</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody id="table-body">
    </tbody>
</table>
</body>
<script>
    fetch('get_api.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('table-body');
            if (data.status === "success" && data.data.length > 0) {
                data.data.forEach(item => {
                    container.innerHTML += `
                    <tr>
                        <td>${item.title}</td>
                        <td>${item.description}</td>
                        <td>${item.hours}</td>
                        <td>${item.price}</td>
                    </tr>
                `;
                });
            }
        });
</script>
</html>
