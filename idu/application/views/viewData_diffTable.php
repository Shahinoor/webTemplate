<div><a href="<?php echo site_url('controller'); ?>">Back</a></div>
<table border="1">
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>University</th>
            <th>Department</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone NO</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Postcode</th>
            <th>Image</th>
            <th>Sex</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) { ?>                                                                    
            <tr>
                <td><?php echo $value->name ?></td>
                <td><?php echo $value->uvn_name ?></td>
                <td><?php echo $value->dept_name ?></td>
                <td><?php echo $value->email ?></td>
                <td><?php echo $value->password?></td>
                <td><?php echo $value->phone ?></td>
                <td><?php echo $value->dob ?></td>
                <td><?php echo $value->add ?></td>
                <td><?php echo $value->postcode ?></td>
                <td><?php echo $value->fileToUpload ?></td>
                <td><?php echo $value->gender_name ?></td>
                <td><?php echo $value->status_name ?></td>
                <td><a href="<?php echo site_url('controller/view_data'); ?>?id=<?php echo $value->eid ?>">view</a>&nbsp;
                    <a href="<?php echo site_url('controller/delete_diffTabledata'); ?>?id=<?php echo $value->eid ?>">delete</a>&nbsp;
                    <a href="<?php echo site_url('controller/edit_multipletableData'); ?>?id=<?php echo $value->eid ?>">Edit</a></td>
            </tr>
        <?php } ?>

    </tbody>

</table>