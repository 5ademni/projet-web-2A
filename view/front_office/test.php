// Now you can construct the image URL using the domain names
foreach ($projects as $project) {
    // Assuming 'domaine' is the key containing the domain name in each project
    $domaine = $project['domaine'];
    $domaine = strtolower(str_replace(' ', '_', $domaine)); // Replace spaces with underscores and convert to lowercase
    $imagePath = 'image/domaines/'; // Replace this with the actual path to your images
    $imageSrc = $imagePath . $domaine . '.jpg';
    if (!file_exists($imageSrc)) {
        $imageSrc = $imagePath . 'generic.jpg';
    }
    // Display each project
    echo '<div class="col-lg-4 col-md-6 col-12">';
    echo '<div class="job-thumb job-thumb-box">';
    echo '<div class="job-image-box-wrap">';
    echo '<a href="job-details.html">';
    echo '<img src="' . $imageSrc . '" class="job-image me-3 img-fluid" alt="">';
    echo '<img src="' . $imageSrc . '" class="job-image img-fluid" alt="">';
    echo '</a>';
    echo '</div>';
    echo '<div class="job-body">';
    echo '<h4 class="job-title">';
    echo '<a href="job-details.html" class="job-title-link">' . $project['nom_projet'] . '</a>';
    echo '</h4>';
    echo '<div class="d-flex align-items-center">';
    echo '<a href="#" class="bi-bookmark ms-auto me-2"></a>';
    echo '<a href="#" class="bi-heart"></a>';
    echo '</div>';
    echo '<p class="job-date">';
    echo '<i class="custom-icon bi-clock me-1"></i>';
    echo $project['time'] . ' hours ago';
    echo '</p>';
    echo '</div>';
    echo '<div class="d-flex align-items-center border-top pt-3">';
    echo '<p class="job-price mb-0">';
    echo '<i class="custom-icon bi-cash me-1"></i>';
    echo '$' . number_format($project['budget']) . ' $';
    echo '</p>';
    echo '<a href="job-details.html" class="custom-btn btn ms-auto">Apply now</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}