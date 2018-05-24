<?php $title = 'Jean Forteroche'; ?>
<?php ob_start(); ?>
  <div class="container">
    <?php while ($data = $posts->fetch()) { ?>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <h3 class="mb-0">
              <strong class="d-inline-block mb-2 text-primary"><?php echo $data['title']; ?>
              </strong>
            </h3>
            <p class="card-text mb-auto"><?php echo nl2br($data['paragraphe']);
                  ?>                    
            </p>
            <p class="lead mb-0"><a href="index.php?action=post&id=<?php echo $data['id']; ?>" class="text-white font-weight-bold continued">Continuer à lire ...</a>
            </p>
          </div>
        </div>
      </div>
    </div>    <?php }  $posts->closeCursor(); ?>  
  </div>
  
  <?php $content = ob_get_clean(); ?>
  <?php require('template.php'); ?>
