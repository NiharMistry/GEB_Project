
<?php
class dataclass
{
    private $conn;
    function __construct()
    {
        $this->conn=mysqli_connect('localhost','root','','gebdata');
    }

    function saverecord($query)
    {
        $result=mysqli_query($this->conn,$query);
        if($result)
        {
           return true;
        }
        else
        {
          return false; 
        }
    }

    function gettable($query)
    {
        $tb=mysqli_query($this->conn,$query);
        return $tb;
    }

    function getrecord($query)
    {
        $tb=mysqli_query($this->conn,$query);
        $rw=mysqli_fetch_array($tb);
        return $rw;
    }
    function primarykey($query)
    {
        $pk=0;
        $tb=mysqli_query($this->conn,$query);
        $rw=mysqli_fetch_array($tb);
        if($rw)
        {
            $pk=$rw[0];
            $pk=$pk+1;
        }
        else
        {
           $pk=1;
        }
        return $pk;
    }

    function counter($query)
    {
        $count=0;
        $tb=mysqli_query($this->conn,$query);
        $rw=mysqli_fetch_array($tb);
        $count=$rw[0];
        return $count;
    }



}


?>