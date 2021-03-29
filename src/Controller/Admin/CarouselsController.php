<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Carousels Controller
 *
 * @property \App\Model\Table\CarouselsTable $Carousels
 *
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarouselsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Positions', 'Colors', 'Situations'],
            'order' => ['Carousels.ordem' => 'ASC']
        ];
        $carousels = $this->paginate($this->Carousels);

        $this->set(compact('carousels'));
    }

    /**
     * View method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carousel = $this->Carousels->get($id, [
            'contain' => ['Positions', 'Colors', 'Situations']
        ]);

        $this->set('carousel', $carousel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carousel = $this->Carousels->newEntity();
        if ($this->request->is('post')) {

            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());
            if (!$carousel->errors()) {
                $carousel->imagem = $this->Carousels->slugUploadImgRed($this->request->getData()['imagem']['name']);

                $carouselTable = TableRegistry::get('Carousels');
                $ultimoSlide = $carouselTable->getUltimoSlide();
                $carousel->ordem = $ultimoSlide->ordem + 1;

                if ($resultSave = $this->Carousels->save($carousel)) {
                    $id = $resultSave->id; // último id inserido

                    $destino = WWW_ROOT . "files" . DS . "carousel" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $carousel->imagem;

                    if ($this->Carousels->uploadImgRed($imgUpload, $destino, 1820, 846)) {
                        $this->Flash->success(__('Imagem cadastrada com sucesso'));
                        return $this->redirect(['controller' => 'Carousels', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('Erro: Imagem não foi cadastrada com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->error(__('Erro: Slide do carousel não foi cadastrado com sucesso'));
                }
            } else {
                $this->Flash->error(__('Erro: Slide do carousel não foi cadastrado com sucesso'));
            }
        }
        $positions = $this->Carousels->Positions->find('list', ['limit' => 200]);
        $colors = $this->Carousels->Colors->find('list', ['limit' => 200]);
        $situations = $this->Carousels->Situations->find('list', ['limit' => 200]);
        $this->set(compact('carousel', 'positions', 'colors', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carousel = $this->Carousels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());
            if ($this->Carousels->save($carousel)) {
                $this->Flash->success(__('Slide do carousel editado com sucesso'));
                return $this->redirect(['controller' => 'Carousels', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('Erro: Slide do carousel não foi editado com sucesso'));
        }
        $positions = $this->Carousels->Positions->find('list', ['limit' => 200]);
        $colors = $this->Carousels->Colors->find('list', ['limit' => 200]);
        $situations = $this->Carousels->Situations->find('list', ['limit' => 200]);
        $this->set(compact('carousel', 'positions', 'colors', 'situations'));
    }

    public function alterarFotoCarousel($id = null)
    {
        $carousel = $this->Carousels->get($id);
        $imagemAntiga = $carousel->imagem;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $carousel = $this->Carousels->newEntity();
            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());
            if (!$carousel->errors()) {
                $carousel->imagem = $this->Carousels->slugUploadImgRed($this->request->getData()['imagem']['name']);
                $carousel->id = $id;
                if ($this->Carousels->save($carousel)) {
                    $destino = WWW_ROOT . "files" . DS . "carousel" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['imagem'];
                    $imgUpload['name'] = $carousel->imagem;

                    if ($this->Carousels->uploadImgRed($imgUpload, $destino, 1820, 846)) {
                        $this->Carousels->deleteFile($destino, $imagemAntiga, $carousel->imagem);
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'Carousels', 'action' => 'view', $id]);
                    } else {
                        $carousel->imagem = $imagemAntiga;
                        $this->Users->save($carousel);
                        $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso. Erro ao realizar o upload'));
                    }
                } else {
                    $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso.'));
            }
        }

        $this->set(compact('carousel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carousel = $this->Carousels->get($id);
        $destino = WWW_ROOT . "files" . DS . "carousel" . DS . $carousel->id . DS;
        $this->Carousels->deleteArq($destino);

        $carouselTable = TableRegistry::get('Carousels');
        $listaSlideProx = $carouselTable->getListaSlideProx($carousel->ordem);

        if ($this->Carousels->delete($carousel)) {
            foreach ($listaSlideProx as $slideProx) {
                $carousel->ordem = $slideProx->ordem - 1;
                $carousel->id = $slideProx->id;
                $this->Carousels->save($carousel);
            }
            $this->Flash->success(__('Slide do carousel apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Slide do carousel não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
