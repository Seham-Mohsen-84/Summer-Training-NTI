<html xmlns="">
<div id="read"></div>
<div><hr><hr></div>
<div id="read1"></div>
<div><hr><hr></div>
<div id="read2"></div>

<script>
    fetch('https://jsonplaceholder.typicode.com/todos')
        .then(response=>response.json())
        .then(data=>{
            data.forEach(item=>{
                document.getElementById('read').innerHTML +=item.title + '<br>';
            });
        });

</script>

<script>
    fetch('https://jsonplaceholder.typicode.com/users/')
        .then(response=>response.json())
        .then(data=>{
              data.forEach(item=>{
              document.getElementById('read1').innerHTML +=item.name + '<br>';
        });
    });
</script>

<script>
    fetch('data.php')
        .then(response => {
            return response.json()
        })
        .then(result=>{
            if(!result.error)
            {
                result.data.forEach(item=>{
                       document.getElementById('read2').innerHTML +=item.name + '<br>'
                });
            }
        });
</script>

</html>
