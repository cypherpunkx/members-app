<div class="container my-4">
    <div class="card" style="width: 18rem;">

        <div class="card-body">
            <h2 class="card-title"><?= $data['members']['first_name'] ?> <?= $data['members']['last_name'] ?></h5>
                <h4 class="card-text text-muted lead card-subtitle"><?= $data['members']['gender'] ?></h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h6>Email :</h6>
                <span class="text-muted"><?= $data['members']['email'] ?></span>
            </div>
            <h6>Ip Address :</h6>
            <span class="text-muted"><?= $data['members']['ip_address'] ?></span>

        </div>
        <div class="card-body">
            <a href="<?= BASEURL; ?>/members" class="card-link">Back</a>
        </div>
    </div>
</div>