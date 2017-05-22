<?php
class paginate
{
    public $per_page = 5;
    private $db;
    public $query;

    function __construct($objcollection,$options=array())
    {
        $this->db = $objcollection->conn;
        $this->query = $objcollection->selectCollectionsSQL($options);
    }

    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function paging()
    {
        $starting_position=0;
        if(isset($_GET["page_no"]))
        {
            $starting_position=($_GET["page_no"]-1)*$this->per_page;
        }
        $query2=$this->query ." limit $starting_position,$this->per_page";
        return $query2;
    }

    public function paginglink()
    {
        //var_dump($_SERVER);
        $self = $_SERVER['REQUEST_URI'];
        $stmt = $this->db->prepare($this->query);
        $stmt->execute();

        $total_no_of_records = $stmt->rowCount();

        if($total_no_of_records > 0)
        {
            ?><tr><td colspan="3"><?php
                $total_no_of_pages=ceil($total_no_of_records/$this->per_page);
                $current_page=1;
                if(isset($_GET["page_no"]))
                {
                    $current_page=$_GET["page_no"];
                    //var_dump($current_page);
                }
                if($current_page!=1)
                {
                    $previous =$current_page-1;
                    echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
                    echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
                }
                if($current_page){

                }
                for($i=1;$i<=$total_no_of_pages;$i++)
                {
                    if($i==$current_page)
                    {
                        echo "<strong><a href='".$self."?page_no=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
                    }
                    else
                    {
                        echo "<a href='?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
                    }
                }
                if($current_page!=$total_no_of_pages)
                {
                    $next=$current_page+1;
                    echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
                    echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
                }
                ?></td></tr><?php
        }
    }
}