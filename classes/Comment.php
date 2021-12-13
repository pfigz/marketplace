<?php

/**
 * Comment
 * 
 * A comment about a product
 */
Class Comment
{

    public function createComment($conn)
    {
        $sql = "INSERT INTO comment (username, productID, comment, rating)
                VALUES (:username, :productID, :comment, :rating)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':productID', $this->productID, PDO::PARAM_INT);
        $stmt->bindValue(':comment', $this->comment, PDO::PARAM_STR);
        $stmt->bindValue(':rating', $this->rating, PDO::PARAM_INT);

        if ($stmt->execute()) {

            $this->commentID = $conn->lastInsertID();
            
        }
    }

    public function getComments($conn, $productID)
    {
        $sql = "SELECT *
                FROM comment
                WHERE productID = $productID";

        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }       
    }
}