<form method="post" action="http://localhost/test/main/edit/ok">
    <input type="hidden" name="id" value="<?=$data[0]?>">
    <input type="text" name="name" value="<?=$data[1]?>"><br>
    <input type="text" name="age" value ="<?=$data[2]?>"><br>
    <input type="submit" name="submit" value="edit">
</form>
<a href="http://localhost/test">Return to list</a>