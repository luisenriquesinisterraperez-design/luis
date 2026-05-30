<?php
declare(strict_types=1);

namespace App\Controller;

class ProductSalsasController extends AppController
{
    public function index($productId = null)
    {
        if (!$productId) {
            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }

        $product = $this->fetchTable('Products')->get($productId, [
            'contain' => ['ProductSalsas'],
        ]);

        if ($this->request->is('post')) {
            $salsa = $this->ProductSalsas->newEmptyEntity();
            $salsa = $this->ProductSalsas->patchEntity($salsa, $this->request->getData());
            $salsa->product_id = $productId;

            if ($this->ProductSalsas->save($salsa)) {
                $this->Flash->success(__('Salsa añadida al producto.'));
            } else {
                $msg = 'No se pudo añadir la salsa.';
                $errors = $salsa->getErrors();
                if (!empty($errors)) {
                    $flat = [];
                    array_walk_recursive($errors, function ($v) use (&$flat) {
                        $flat[] = $v;
                    });
                    $msg .= ' ' . implode(' | ', $flat);
                }
                $this->Flash->error(__($msg));
            }

            return $this->redirect(['action' => 'index', $productId]);
        }

        $this->set(compact('product'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salsa = $this->ProductSalsas->get($id);
        $productId = $salsa->product_id;

        if ($this->ProductSalsas->delete($salsa)) {
            $identity = $this->request->getAttribute('identity');
            $user = $identity ? $identity->getOriginalData() : null;
            $this->logAudit(
                $user ? $user->id : 1,
                'ELIMINACIÓN: El usuario ' . ($user ? $user->username : 'Sistema') . " eliminó la salsa \"{$salsa->name}\" del producto #{$productId}",
            );
            $this->Flash->success(__('Salsa eliminada del producto.'));
        }

        return $this->redirect(['action' => 'index', $productId]);
    }
}
