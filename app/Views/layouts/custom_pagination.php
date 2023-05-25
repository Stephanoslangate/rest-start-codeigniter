<!-- Limit to 3 Links each side of the current page -->
<?php $pager->setSurroundCount(3)  ?>
<!-- END-->
 
<div class="row">
    <!-- Pagination -->
 
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
     <ul class="pagination">
            <!-- Previous and First Links if available -->
            <?php if($pager->hasPrevious()): ?>
                <li class="page-item">
                    <a href="<?= $pager->getFirst() ?>" class="page-link">First</a>
                </li>
                <li class="page-item">
                    <a href="<?= $pager->getPrevious() ?>" class="page-link">Previous</a>
                </li>
            <?php endif; ?>
            <!-- End of Previous and First -->
 
            <!-- Page Links -->
            <?php foreach($pager->links() as $link): ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>"><a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
            <?php endforeach; ?>
            <!-- End of Page Links -->
 
            <!-- Next and Last Page -->
            <?php if($pager->hasNext()): ?>
                <li class="page-item">
                    <a href="<?= $pager->getNext() ?>" class="page-link">Next</a>
                </li>
                <li class="page-item">
                    <a href="<?= $pager->getLast() ?>" class="page-link">Last</a>
                </li>
            <?php endif; ?>
            <!-- End of Next and Last Page -->
        </ul>
    </div>
    <!-- End of Pagination -->
 
    <!-- Pagination Details -->
    <div class="col-lg-5 col-md-5 col-sm-9 col-xs-9">
        <div class="fw-light fs-italic text-muted text-end">Affichage <?= ((intval($page) * $perPage) - $perPage +1) ."-". ((intval($page) * $perPage) - $perPage + count($users))  ?> Resultat de <?= number_format($total) ?></div>
    </div>
    <!-- End of Pagination Details -->
</div>