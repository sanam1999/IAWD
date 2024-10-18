<?php
 function saveReview($product_id, $rating, $comment){
     include('conn.php');
    if (isset($_SESSION['userid']) && $_SESSION['login']) {
        $uname = $_SESSION['user'];
        $user_id = $_SESSION['userid'];
    } else {
        $_SESSION['error'] = "You are not logged in.";
        header('Location: view/product/login.php');
        exit();
    }
    $review_id = generateUUID();
   
   
            $sql = "INSERT INTO Reviews (review_id, product_id, user_id, rating, comment,uname) VALUES (?, ?, ?, ?, ?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssiss", $review_id, $product_id,$user_id, $rating, $comment, $uname );
        if ($stmt) {
            if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Review submitted successfully";
            } else {
            $_SESSION['error'] = "Error occurred during execution: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error'] = "Error occurred while preparing the statement: " . mysqli_error($conn);
        }
    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
function GetReview($pid)
{
    include ('conn.php');
    
    $sql = "SELECT * FROM Reviews WHERE product_id = '$pid'";
    
    $result = mysqli_query($conn, $sql);
    
    $Reviews = array();
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Review = new stdClass();
            $Review->product_id = $row['product_id'];
            $Review->user_id = $row['user_id'];
            $Review->uname = $row['uname'];
            $Review->review_id = $row['review_id'];
            $Review->rating = $row['rating'];
            $Review->comment = $row['comment'];
            $Reviews[] = $Review;
        }
    }
   

    mysqli_free_result($result);
    return $Reviews;
}
function deleteReview($review_id)
{
    include ('conn.php');
    $sql = "DELETE FROM Reviews WHERE review_id = '$review_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Record deleted successfully";
    } else {
        $_SESSION['error'] = "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function fetchReview($user_id)
{
    include('conn.php');
    $sql = "SELECT
    SUM(rating) AS total_rating,
    COUNT(rating) AS rating_count
FROM
    Reviews
RIGHT JOIN Products ON Reviews.product_id = Products.product_id
WHERE
    Products.user_id = '$user_id';
";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return [
            'total_rating' => $row['total_rating'],
            'rating_count' => $row['rating_count']
        ];
    } else {
        return [
            'total_rating' => 0,
            'rating_count' => 0
        ];
    }
}

?>