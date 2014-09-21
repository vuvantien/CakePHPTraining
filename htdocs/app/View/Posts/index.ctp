<!-- File: /app/View/Posts/index.ctp -->
<h1>Blog posts</h1>
<?php
echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'));
?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Query all posts from Controller Data -->
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; //Post: object of Post model ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php

            echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm'=> 'Are you sure ?'));
            echo ' ';
            echo $this->Html->link('Edit', array('controller'=>'posts', 'action'=>'edit', $post['Post']['id']));

            ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>