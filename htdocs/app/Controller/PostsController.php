<?php
/**
 * Created by PhpStorm.
 * User: MrTien
 * Date: 8/24/14
 * Time: 10:33 AM
 */

class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    //Index actions for PostsController
    public function index(){
        //set(): Pass data from the controller to the View (index.tcp)
        $this->set('posts', $this->Post->find('all'));
    }

    //view action for PostsController
    public function view($id = null){
        if(!$id){
            throw new NotFoundException(__('Invalid Post'));
        }

        $post = $this->Post->findById($id);

        if(!$post){
            throw new NotFoundException(__('Invalid Post'));
        }

        //Pass data from the controller to the View (view.tcp)
        $this->set('post', $post);
    }

    //add action for PostsController
    public function add(){
        if($this->request->is('post')){
            $this->Post->create();
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    //edit action for PostsController
    public function edit($id = null){

        if(!$id){
            throw new NotFoundException(__('Invalid Post'));
        }

        $post = $this->Post->findById($id);

        if(!$post){
            throw new NotFoundException(__('Invalid Post'));
        }

        if($this->request->is(array('post', 'put'))){
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post'));
        }

        if(!$this->request->data){
            $this->request->data = $post; //The request data is NULL ==> assign to current post data
        }
    }


    //delete action for PostsController
    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }

        if($this->Post->delete($id)){
            $this->Session->setFlash(__('The post with id: %s has been deleted.',h($id)));
        }

        return $this->redirect(array('action' => 'index'));
    }

} 