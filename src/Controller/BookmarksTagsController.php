<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BookmarksTags Controller
 *
 * @property \App\Model\Table\BookmarksTagsTable $BookmarksTags
 */
class BookmarksTagsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('bookmarksTags', $this->paginate($this->BookmarksTags));
        $this->set('_serialize', ['bookmarksTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookmarks Tag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmarksTag = $this->BookmarksTags->get($id, [
            'contain' => []
        ]);
        $this->set('bookmarksTag', $bookmarksTag);
        $this->set('_serialize', ['bookmarksTag']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmarksTag = $this->BookmarksTags->newEntity();
        if ($this->request->is('post')) {
            $bookmarksTag = $this->BookmarksTags->patchEntity($bookmarksTag, $this->request->data);
            if ($this->BookmarksTags->save($bookmarksTag)) {
                $this->Flash->success('The bookmarks tag has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The bookmarks tag could not be saved. Please, try again.');
            }
        }
        $this->set(compact('bookmarksTag'));
        $this->set('_serialize', ['bookmarksTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmarks Tag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmarksTag = $this->BookmarksTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmarksTag = $this->BookmarksTags->patchEntity($bookmarksTag, $this->request->data);
            if ($this->BookmarksTags->save($bookmarksTag)) {
                $this->Flash->success('The bookmarks tag has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The bookmarks tag could not be saved. Please, try again.');
            }
        }
        $this->set(compact('bookmarksTag'));
        $this->set('_serialize', ['bookmarksTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmarks Tag id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmarksTag = $this->BookmarksTags->get($id);
        if ($this->BookmarksTags->delete($bookmarksTag)) {
            $this->Flash->success('The bookmarks tag has been deleted.');
        } else {
            $this->Flash->error('The bookmarks tag could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
