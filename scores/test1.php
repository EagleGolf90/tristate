<?php
include('../preload.php');
include(CLASSES . 'golf_scores.class.php');
$scores = new GolfScores();

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <div class="m-5 py-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://sedga.org/registration/images/sedga_logo.jpg" alt="" width="150" height="150">
    <h2>SEDGA Golf Setup</h2>
    <!-- <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
  </div>
  <main>
    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="annual" class="form-label">Annual</label>
              <input type="text" class="form-control" id="annual" placeholder="" value="<?php echo $scores->getAnnual(); ?>" required>
              <div class="invalid-feedback">
                Valid annual is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="nbrOfGroups" class="form-label">Number of Groups</label>
              <input type="text" class="form-control" id="nbrOfGroups" placeholder="" value="<?php echo $scores->getNbrOfGroups(); ?>" required>
              <div class="invalid-feedback">
                Valid number of groups is required.
              </div>
            </div>

            <div class="col-12">
              <label for="yearPlayed" class="form-label">YearPlayed</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="yearPlayed" placeholder="YearPlayed" value="<?php echo $scores->getYearPlayed(); ?>" required>
                <div class="invalid-feedback">
                  year Played is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include(HTML . 'endHTML.php'); ?>
