@extends('layout')
@section('content')
<?php if($pageNum>1){?>
<nav>
  <ul class="pagination">
<?php if($page!=1){?>
    <li>
	<a href="<?php echo $url;?>?page=<?php echo $page-1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php }?>
<?php for($i=1;$i<=$pageNum;$i++){?>
<?php while($i==$page){?>
<li class='active'><a href="#"><?php echo $i;?></a></li>
<?php break;}?>
<?php while($i!=$page&&$i<=($page-4)){?>
<li><a href="<?php echo $url;?>?page=1">1</a>&nbsp...&nbsp</li>
<?php break;}?>
<?php while($i!=$page&&$i<($page+4)&&$i>($page-4)){?>
<li><a href="<?php echo $url;?>?page=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php break;}?>
<?php while($i!=$page&&$i>=($page+4)){?>
<li>&nbsp...&nbsp<a href="<?php echo $url;?>?page=<?php echo $pageNum;?>"><?php echo $pageNum;?></a></li>
<?php break;}?>
<?php }?>
<?php if($page!=$pageNum){?>
    <li>
	<a href="<?php echo $url;?>?page=<?php echo $page+1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
<?php }?>
  </ul>
</nav>
<?php }?>
@endsection

