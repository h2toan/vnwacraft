<div class="container fixed-top">
    <nav class="navbar navbar-expand-md navbar-dark"> <a class="navbar-brand nav-logo" href="<?php echo get_home_url() ?>"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="<?php echo get_home_url() ?>">Trang chủ <span class="sr-only">(current)</span></a> </li>
          <?php nav_category ('Lore'); ?>
          <?php nav_category ('Theory'); ?>
        </ul>
        <form class="form-inline my-2 my-md-2" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <input class="form-control mr-sm-2" type="search" placeholder="Tìm thứ gì đó" aria-label="Search" value="<?php echo get_search_query(); ?>" name="s">
          <button class="btn btn-outline-primary my-2 my-md-2" type="submit">Go</button>
        </form>
      </div>
    </nav>
</div>