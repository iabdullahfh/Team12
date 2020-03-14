<?php include("connect.php");

$category = safeParse($conn, $_POST["category"]);
$title = safeParse($conn, $_POST["title"]);
$comments = safeParse($conn, $_POST["comments"]);

function safeParse($conn, $input)
{

    $input = htmlspecialchars($input);
    $input = $conn->real_escape_string($input);
    
    return $input;
}
?>

<?php

$sql = "INSERT INTO feedback(Category, Title, Comment)
values ('$category','$title', '$comments')";
    
if ($conn->query($sql) == TRUE)
{
echo "New record is inserted sucessfully";
    printTable($conn);
    
}
else
{
echo "Error: ". $sql ."". $conn->error;
}
function printTable($conn)
{
    //Get table columns
    $titles = $conn->query("SHOW COLUMNS FROM feedback");
    echo '<table>';
    echo '<tr>';
    
    //print them out.
    while ($row = $titles->fetch_array())
    {
        echo "<th>$row[Field]</th>";
    }

    echo '</tr>';
    
    $content = $conn->query("SELECT * FROM feedback");

    //print the content of the table
    while ($row = $content->fetch_array(MYSQLI_NUM))
    {
            echo '<tr>';
            foreach ($row as $item)
            {
                    echo "<td>$item</td>";
            }

            echo '</tr>';
    }

    echo '</table>';
}
$conn->close();



?>
