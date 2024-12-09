<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Courses Management
Breadcrumbs::for('courses.management', function (BreadcrumbTrail $trail) {
    $trail->push('Course Management', route('courses.management'));
});

// Course Create
Breadcrumbs::for('courses.create', function (BreadcrumbTrail $trail) {
    $trail->parent('courses.management');
    $trail->push('Create Course', route('courses.create'));
});

// Course Edit
Breadcrumbs::for('courses.edit', function (BreadcrumbTrail $trail, $courseId) {
    $trail->parent('courses.management');
    $trail->push("Edit Course #$courseId", route('courses.edit', $courseId));
});

// Modules Index
Breadcrumbs::for('modules.index', function (BreadcrumbTrail $trail, $courseId) {
    $trail->push("Modules", route('modules.index', $courseId));
});

// Manage Students
Breadcrumbs::for('courses.students', function (BreadcrumbTrail $trail, $course) {
    $trail->parent('modules.index', $course);
    $trail->push("Manage Students", route('courses.students', $course));
});

Breadcrumbs::for('courses.activity', function (BreadcrumbTrail $trail, $course, $student) {
    $trail->parent('modules.index', $course);
    $trail->push("Student Activity", route('courses.activity', [$course, $student]));
});

// Modules Create
Breadcrumbs::for('modules.create', function (BreadcrumbTrail $trail, $courseId) {
    $trail->parent('modules.index', $courseId);
    $trail->push('Create Module', route('modules.create', $courseId));
});

// Modules Edit
Breadcrumbs::for('modules.edit', function (BreadcrumbTrail $trail, $courseId, $moduleId) {
    $trail->parent('modules.index', $courseId);
    $trail->push("Edit Module", route('modules.edit', [$moduleId, $courseId]));
});

// Tasks Index
Breadcrumbs::for('tasks.index', function (BreadcrumbTrail $trail, $moduleId, $courseId) {
    $trail->parent('modules.index', $courseId);
    $trail->push("Tasks", route('tasks.index', ['module_id' => $moduleId, 'course_id' => $courseId]));
});

// Tasks Create
Breadcrumbs::for('tasks.create', function (BreadcrumbTrail $trail, $moduleId, $courseId) {
    $trail->parent('tasks.index', $moduleId, $courseId);
    $trail->push('Create Task', route('tasks.create', ['course_id' => $courseId, 'module_id' => $moduleId]));
});

// Tasks Edit
Breadcrumbs::for('tasks.edit', function (BreadcrumbTrail $trail, $moduleId, $taskId, $courseId) {
    $trail->parent('tasks.index', $moduleId, $courseId);
    $trail->push("Edit Task", route('tasks.edit', ['module_id'=>$moduleId,'id'=> $taskId, 'course_id'=> $courseId]));
});

// Answers Index
Breadcrumbs::for('answers.index', function (BreadcrumbTrail $trail, $taskId, $moduleId, $courseId) {
    $trail->parent('tasks.index', $moduleId, $courseId);
    $trail->push("Answers", route('answers.index', ['course_id' => $courseId, 'module_id' => $moduleId, 'task_id' => $taskId]));
});

// Answers Create
Breadcrumbs::for('answers.create', function (BreadcrumbTrail $trail, $taskId, $moduleId, $courseId) {
    $trail->parent('tasks.index', $moduleId, $courseId);
    $trail->push('Create Answer', route('answers.create', ['course_id' => $moduleId, 'module_id' => $courseId, 'task_id' => $taskId]));
});

// Answers Edit
Breadcrumbs::for('answers.edit', function (BreadcrumbTrail $trail, $answerId, $taskId, $moduleId, $courseId) {
    $trail->parent('answers.index', $taskId, $moduleId, $courseId);
    $trail->push("View Answer", route('answers.edit', ['course_id' => $courseId, 'module_id' => $moduleId, 'task_id' => $taskId, 'id' => $answerId]));
});
