<?php foreach($applicants as $applicant) : ?>
  <tr>
    <th scope="row"><?php echo $applicant['id']; ?></th>
    <td><?php echo $applicant['first_name']; ?></td>
    <td><?php echo $applicant['last_name']; ?></td>
    <td><?php echo $applicant['email']; ?></td>
    <td><?php echo $applicant['gender']; ?></td>
    <td><?php echo $applicant['profession']; ?></td>
    <td><?php echo $applicant['description']; ?></td>
    <td><?php echo $applicant['resume']; ?></td>
  </tr>
<?php endforeach; ?>

<!-- test paginator -->

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>