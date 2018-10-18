<?php get_header(); ?>
  <main id="main" class="hp-main">
    <div class="container">
      <?php get_template_part('partials/page-header'); ?>

      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>

      <?php if(have_rows('tables')): ?>
        <section id="product-tables">
          <ul class="nav nav-justified" role="tablist">
            <?php $c=0; while(have_rows('tables')): the_row(); ?>
              <li role="presentation"<?php if($c==0){ echo ' class="active"'; } ?>>
                <a href="#<?php echo sanitize_title(get_sub_field('table_category')); ?>" aria-controls="<?php echo sanitize_title(get_sub_field('table_category')); ?>" role="tab" data-toggle="tab"><?php the_sub_field('table_category'); ?></a>
              </li>
            <?php $c++; endwhile; ?>
          </ul>

          <div class="tab-content">
            <?php $t=0; while(have_rows('tables')): the_row(); ?>
              <div id="<?php echo sanitize_title(get_sub_field('table_category')); ?>" class="tab-pane fade<?php if($t==0){ echo ' in active'; } ?>" role="tabpanel">
                <div class="responsive-table">
                  <table class="table table-condensed table-striped">
                    <?php $table_column_headers = []; ?>
                    <?php if(have_rows('table_column_headers')): ?>
                      <thead>
                        <tr>
                          <?php while(have_rows('table_column_headers')): the_row(); ?>
                            <th><?php the_sub_field('table_column_header'); ?></th>
                          <?php endwhile; ?>
                        </tr>
                      </thead>
                      <?php $table_column_headers = get_sub_field('table_column_headers'); ?>
                    <?php endif; ?>

                    <?php if(have_rows('table_section')): while(have_rows('table_section')): the_row(); ?>
                      <tbody>
                        <?php if(have_rows('table_section_row')): while(have_rows('table_section_row')): the_row(); ?>
                          <tr>
                            <th scope="row"><?php the_sub_field('row_title'); ?></th>
                            <?php
                              $column_count = count($table_column_headers);
                              $row_fields = get_sub_field('row_fields');

                              if(!empty($row_fields)){
                                for($f = 0; $f < $column_count - 1; $f++){
                                  $row_value = !empty($row_fields[$f]['row_field']) ? $row_fields[$f]['row_field'] : '&nbsp;';
                                  echo '<td>' . preg_replace('/\d+\.\d{2}/', '$$0', $row_value) . '</td>';
                                }
                              }
                            ?>
                          </tr>
                        <?php endwhile; endif; ?>
                      </tbody>
                    <?php endwhile; endif; ?>
                  </table>
                </div>
              </div>
            <?php $t++; endwhile; ?>
          </div>
        </section>
      <?php endif; ?>
    
      <?php if(get_field('price_disclaimer')): ?>
        <div class="products-disclaimer">
          <p><?php the_field('price_disclaimer'); ?></p>
        </div>
      <?php endif; ?>
    </div>
    <div class="bottom-dirt"></div>
  </main>
<?php get_footer(); ?>