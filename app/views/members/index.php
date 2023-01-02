<div class="container w-75">
  <div class="title d-flex justify-content-between align-items-baseline my-4">
    <h1 class="display-3">Members</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary add-member-btn" data-bs-toggle="modal" data-bs-target="#addMember">
      Add Member
    </button>
  </div>
  <div class="container-fluid my-4">
    <form action="<?= BASEURL; ?>members/search" class="d-flex" role="search" method="post">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <ul class="list-group list-group-flush">
    <?php foreach ($data['members'] as $member) : ?>
      <li class="list-group-item d-flex justify-content-between align-items-center"><?= $member['first_name'] ?>
        <div class="d-flex justify-content-end gap-2">
          <a href="<?= BASEURL; ?>members/detail/<?= $member['id'] ?>" class="btn btn-info">Details</a>
          <a href="<?= BASEURL; ?>members/getUpdate/<?= $member['id'] ?>" class="btn btn-success update-member-btn" data-bs-toggle="modal" data-bs-target="#addMember" data-id="<?= $member['id']; ?>">Update</a>
          <a href="<?= BASEURL; ?>members/delete/<?= $member['id'] ?>" class="btn btn-danger delete">Delete</a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>


<!-- Modal -->
<div class="modal fade" id="addMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMemberLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addMemberLabel">Add Member</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>members/add" method="POST">
          <input type="hidden" id="id" name="id">
          <div class="mb-3">
            <label for="first_name" class="form-label">First Name :</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name...">
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name :</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name...">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <div class="mb-3">
              <label for="gender" class="form-label">Gender :</label>
              <select class="form-select" aria-label="gender" id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="ip_address" class="form-label">IP Address :</label>
              <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="127.0.0.1">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-action">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>