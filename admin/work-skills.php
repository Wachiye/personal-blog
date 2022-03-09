<?php
    session_start();
    if(!$_SESSION['logged_in']){
        return header('Location:./');
    }

    if (! defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    $page_id = 'Settings';
    include_once ROOT_PATH . 'functions/delete-experience.php';
    include_once ROOT_PATH . 'functions/delete-education.php';
    include_once ROOT_PATH . 'functions/delete-skill.php';

    include_once ROOT_PATH . 'functions/create-experience.php';
    include_once ROOT_PATH . 'functions/create-education.php';
    include_once ROOT_PATH . 'functions/create-skill.php';

    include_once ROOT_PATH . 'functions/get-experiences.php';  
    include_once ROOT_PATH . 'functions/get-education.php';
    include_once ROOT_PATH . 'functions/get-skills.php';

    include_once ROOT_PATH . 'includes/admin-header.php';
    include_once ROOT_PATH . 'includes/admin-nav.php';

?>

<div class="main">
    <main class="main-content">
        <div class="container-fluid">
            <div class="card shadow-none mb-2">
                <div class="card-body">
                    <?php
                        if(!empty($message_error)){
                            echo <<<EOT
                                <div class="alert alert-danger alert-dismissible">
                                    <p>$message_error</p>
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            EOT;
                        }
                        if(!empty($message_reply)){
                            echo <<<EOT
                                <div class="alert alert-info alert-dismissible">
                                    <p>$message_reply</p>
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            EOT;
                        }
                    ?>
                    <form method="POST" target="_self">
                        <input type="hidden" name="type" value="experience">
                        <h5 class="card-title">Work & Experiences</h5>
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Tasks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($experiences)){
                                    foreach($experiences as $exp){
                                        $exp['tasks'] = implode(",", $exp["tasks"]);
                                        echo <<<EOT
                                        <tr>
                                            <td class="small">{$exp['title']}</td>
                                            <td class="small">{$exp['company']} </td>
                                            <td>{$exp['start_year']}</td>
                                            <td>{$exp['end_year']}</td>
                                            <td class="small"> {$exp['tasks']}</td>
                                            <td>
                                                <div class="btn-group action-list">
                                                    <a class="btn btn-light text-danger btn-sm" href="?action=delete&type=experience&experience_id={$exp['experience_id']}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </div>
                                        EOT;
                                    } 
                                }

                            ?>
                            <tr>
                                <td>
                                    <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Title">
                                </td>
                                <td>
                                    <input type="text" name="company" id="company" class="form-control"
                                            placeholder="Company">
                                </td>
                                <td>
                                    <input type="text" name="from" id="from" class="form-control"
                                            placeholder="From Year">
                                </td>
                                <td>
                                    <input type="text" name="to" id="to" class="form-control"
                                            placeholder="To Year">
                                    <small>Leave blank if still in</small>
                                </td>
                                <td>
                                    <input type="text" name="tasks" id="tasks" class="form-control"
                                            placeholder="eg Task 1, Task 2">
                                </td>
                                <td>
                                    <button  class="btn btn-success btn-sm" type="submit" >Add</button>
                                </td>
                                        
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="card shadow-none mb-2">
                <div class="card-body">
                    <form method="POST" target="_self">
                        <input type="hidden" name="type" value="education">
                        <h5 class="card-title">Education</h5>
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Institution</th>
                                    <th>Location</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($education)){
                                    foreach($education as $ed){
                                        echo <<<EOT
                                        <tr>
                                            <td class="small">{$ed['course']}</td>
                                            <td class="small">{$ed['institution']} </td>
                                            <td>{$ed['location']}</td>
                                            <td>{$ed['start_year']}</td>
                                            <td>{$ed['end_year']}</td>
                                            <td class="small"> {$ed['grade']}</td>
                                            <td>
                                                <div class="btn-group action-list">
                                                    <a class="btn btn-light text-danger btn-sm" href="?action=delete&type=education&education_id={$ed['education_id']}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </div>
                                        EOT;
                                    } 
                                }

                            ?>
                            <tr>
                                <td>
                                    <input type="text" name="course" id="course" class="form-control"
                                            placeholder="Course">
                                </td>
                                <td>
                                    <input type="text" name="institution" id="institution" class="form-control"
                                            placeholder="Institution">
                                </td>
                                <td>
                                    <input type="text" name="location" id="location" class="form-control"
                                            placeholder="Institution Location">
                                </td>
                                <td>
                                    <input type="text" name="from" id="from" class="form-control"
                                            placeholder="From Year">
                                </td>
                                <td>
                                    <input type="text" name="to" id="to" class="form-control"
                                            placeholder="To Year">
                                    <small>Leave blank if still in</small>
                                </td>
                                <td>
                                    <input type="text" name="grade" id="grade" class="form-control"
                                            placeholder="Grade">
                                </td>
                                <td>
                                    <button  class="btn btn-success btn-sm" type="submit" >Add</button>
                                </td>
                                        
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="card shadow-none mb-2">
                <div class="card-body">
                    <form method="POST" target="_self">
                        <input type="hidden" name="type" value="skills">
                        <h5 class="card-title">Skills</h5>
                        <table class="table table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>category</th>
                                    <th>Skills</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(isset($skills)){
                                    foreach($skills as $skill){
                                        $skill['skills'] = implode(",", $skill['skills']);
                                        echo <<<EOT
                                        <tr>
                                            <td>{$skill['skill_id']}</td>
                                            <td>{$skill['category']}</td>
                                            <td>{$skill['skills']} </td>
                                            <td>
                                                <div class="btn-group action-list">
                                                    <a class="btn btn-light text-danger btn-sm" href="?action=delete&type=skill&skill_id={$skill['skill_id']}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </div>
                                        EOT;
                                    } 
                                }

                            ?>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="text" name="category" id="category" class="form-control"
                                            placeholder="eg Languages">
                                </td>
                                <td>
                                    <input type="text" name="skills" id="skills" class="form-control"
                                            placeholder="eg English, Kiswahili">
                                </td>
                                <td>
                                    <button  class="btn btn-success btn-sm" type="submit" >Add</button>
                                </td>
                                        
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once ROOT_PATH . 'includes/admin-footer.php' ?>