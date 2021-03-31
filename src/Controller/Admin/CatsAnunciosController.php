<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CatsAnuncios Controller
 *
 * @property \App\Model\Table\CatsAnunciosTable $CatsAnuncios
 *
 * @method \App\Model\Entity\CatsAnuncio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CatsAnunciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations', 'Situations.Colors'],
            'order' => ['CatsAnuncios.ordem' => 'ASC']
        ];
        $catsAnuncios = $this->paginate($this->CatsAnuncios);

        $this->set(compact('catsAnuncios'));
    }

    /**
     * View method
     *
     * @param string|null $id Cats Anuncio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catsAnuncio = $this->CatsAnuncios->get($id, [
            'contain' => ['Situations', 'Situations.Colors']
        ]);

        $this->set('catsAnuncio', $catsAnuncio);
    }

    public function altOrdemCatsAnuncios($id = null)
    {

        $this->loadModel('CatsAnuncios');

        $catAnuncioAtual = $this->CatsAnuncios->getCatAnuncioAtual($id);

        $ordemMenor = $catAnuncioAtual->ordem - 1;
        $catAnuncioMenor = $this->CatsAnuncios->getCatAnuncioMenor($ordemMenor);
        //var_dump($slideMenor);

        if ($catAnuncioMenor) {
            $catAnuncioAtualAlt = $this->CatsAnuncios->newEntity();
            $catAnuncioAtualAlt->id = $catAnuncioAtual->id;
            $catAnuncioAtualAlt->ordem = $catAnuncioAtual->ordem - 1;
            $this->CatsAnuncios->save($catAnuncioAtualAlt);

            $catAnuncioMenorAlt = $this->CatsAnuncios->newEntity();
            $catAnuncioMenorAlt->id = $catAnuncioMenor->id;
            $catAnuncioMenorAlt->ordem = $catAnuncioMenor->ordem + 1;
            $this->CatsAnuncios->save($catAnuncioMenorAlt);


            $this->Flash->success(__('Alterado a ordem com sucesso'));
            return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'index']);
        } else {
            $this->Flash->danger(__('Erro: A ordem não foi alterada com sucesso'));
            return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catsAnuncio = $this->CatsAnuncios->newEntity();
        if ($this->request->is('post')) {
            $catsAnuncio = $this->CatsAnuncios->patchEntity($catsAnuncio, $this->request->getData());
            if (!$catsAnuncio->errors()) {

                $catsAnuncio->slug = $this->CatsAnuncios->slugUrlSimples($this->request->getData()['nome']);


                $this->loadModel('CatsAnuncios');
                $ultimoCatAnuncio = $this->CatsAnuncios->getUltimaCatAnuncio();
                $catsAnuncio->ordem = $ultimoCatAnuncio->ordem + 1;

                if ($resultSave = $this->CatsAnuncios->save($catsAnuncio)) {
                    $id = $resultSave->id; // último id inserido
                    $this->Flash->success(__('Categoria de anúncio cadastrado com sucesso'));
                    return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'view', $id]);
                } else {
                    $this->Flash->danger(__('Erro: Categoria de anúncio não foi cadastrada com sucesso.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Categoria de anúncio não foi cadastrada com sucesso.'));
            }
        }
        $situations = $this->CatsAnuncios->Situations->find('list', ['limit' => 200]);
        $this->set(compact('catsAnuncio', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cats Anuncio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catsAnuncio = $this->CatsAnuncios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catsAnuncio = $this->CatsAnuncios->patchEntity($catsAnuncio, $this->request->getData());
            if (!$catsAnuncio->errors()) {

                $catsAnuncio->slug = $this->CatsAnuncios->slugUrlSimples($this->request->getData()['nome']);
                if ($this->CatsAnuncios->save($catsAnuncio)) {
                    $this->Flash->success(__('Categoria de anúncio editado com sucesso'));
                    return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'view', $id]);
                } else {
                    $this->Flash->danger(__('Erro: Categoria de anúncio não foi editada com sucesso.'));
                }
            } else {
                $this->Flash->danger(__('Erro: Categoria de anúncio não foi editada com sucesso.'));
            }
        }
        $situations = $this->CatsAnuncios->Situations->find('list', ['limit' => 200]);
        $this->set(compact('catsAnuncio', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cats Anuncio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catsAnuncio = $this->CatsAnuncios->get($id);

        $this->loadModel('CatsAnuncios');
        $listCatAnuncioProx = $this->CatsAnuncios->getListCatAnuncioProx($catsAnuncio->ordem);

        if ($this->CatsAnuncios->delete($catsAnuncio)) {
            foreach ($listCatAnuncioProx as $catAnuncioProx) {
                $catsAnuncio->ordem = $catAnuncioProx->ordem - 1;
                $catsAnuncio->id = $catAnuncioProx->id;
                $this->CatsAnuncios->save($catsAnuncio);
            }
            $this->Flash->success(__('Categoria de anúncio apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Categoria de anúncio não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function altCatDestHome($id = null)
    {
        $this->loadModel('CatsAnuncios');
        $catAnuncioDetHome = $this->CatsAnuncios->getCatDestHome($id);

        if ($catAnuncioDetHome->destaque_home == 2) {
            $altCatAnuncDetHome = $this->CatsAnuncios->newEntity();
            $altCatAnuncDetHome->destaque_home = 1;
            $altCatAnuncDetHome->id = $catAnuncioDetHome->id;
            $this->CatsAnuncios->save($altCatAnuncDetHome);
            $this->Flash->success(__('Categoria de anúncio alterada com sucesso.'));
            return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'index']);
        } else {
            $altCatAnuncDetHome = $this->CatsAnuncios->newEntity();
            $altCatAnuncDetHome->destaque_home = 2;
            $altCatAnuncDetHome->id = $catAnuncioDetHome->id;
            $this->CatsAnuncios->save($altCatAnuncDetHome);
            $this->Flash->success(__('Categoria de anúncio alterada com sucesso.'));
            return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'index']);
        }

        $this->Flash->error(__('Erro: A categoria de anúncio não foi alterada com sucesso.'));
        return $this->redirect(['controller' => 'CatsAnuncios', 'action' => 'index']);
    }
}
