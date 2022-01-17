<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Build extends BaseController
{
    public $erros = '';
    public function index()
    {
        $msg = [
            'message' => '',
            'alert' => ''
        ];
        if (session()->has('erro')) {
            $this->erros = session('erro');
            $msg = [
                'message' => '<i class="fa fa-exclamation-triangle"></i> Opps! Erro(s) no preenchimento!',
                'alert' => 'danger'
            ];
        }

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros
        );


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');
    }
    public function add()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/build');
        }
        /*$validated = $this->validate([
            'imagem' => [
                'rules'=> 'uploaded[imagem]',
                'label' =>'imagem',
                //'mime_in[imagem,image/jpg,image/jpeg,image/gif,image/png]',
                //'max_size[imagem,4096]',
            ],
        ]);*/
        $val = $this->validate(
            [
                'title'        => 'required|min_length[3]',
                'resume'         => 'required',
                'image-main'         => 'required',
                'category'         => 'required',
                'text'         => 'required|min_length[20]',
                //'imagem'		=> [//'required'
                //'uploaded[imagem]',
                //'max_size[imagem,1024]',
                //'is_image[imagem]',
                //'mime_in[imagem,image/jpg,image/jpeg,image/gif,image/png]'
                //]
            ],
            [
                'title'        => [
                    'required' => 'O campo TÍTULO tem preenchimento obrigatório!',
                    'min_length' => 'O campo TÍTULO precisar tem no mínimo 3 caracteres!'
                ],
                'resume'        => [
                    'required' => 'O campo RESUMO tem preenchimento obrigatório!'
                ],
                'image-main'        => [
                    'required' => 'O campo IMAGEM PRINCIPAL tem preenchimento obrigatório!'
                ],
                'text'        => [
                    'required' => 'O campo TEXTO tem preenchimento obrigatório!',
                    'min_length' => 'O campo TEXTO precisar tem no mínimo 20 caracteres!'
                ],
                /*'imagem'        => [
				'uploaded' => 'O campo IMAGEM tem preenchimento obrigatório!',
				'max_size' => 'O campo IMAGEM tem um limite!',
				'mime_in' => 'tipo não permitido'
			]*/
            ]
        );

        if (!$val) {
            return redirect()->back()->withInput()->with('erro', $this->validator);
        } else {
            /*$blog['title'] = $this->request->getPost('title');
            $blog['text'] = $this->request->getPost('text');
            $blog['image-main'] = $this->request->getPost('image-main');
            $blog['data_postagem'] = date('d/m/Y');*/

            $dadosArticle = array(
                'title' => $this->request->getPost('title'),
                'resume' => $this->request->getPost('resume'),
                'text' => $this->request->getPost('text'),
                'image-main' => createSlug($this->request->getPost('title')).'-01.jpg',
                'category' => $this->request->getPost('category'),
                'date' => date('d/m/Y'),
                'text-second' => $this->request->getPost('text-second'),
                'image-text-second' => $this->request->getPost('image-text-second'),
                'quote' => $this->request->getPost('quote'),
                'quote-author' => $this->request->getPost('quote-author'),
                'image-video' => $this->request->getPost('image-video'),
                'link-video' => $this->request->getPost('link-video'),
                'title-video' => $this->request->getPost('title-video'),
                'text-video' => $this->request->getPost('text-video'),
                'image-gallery' => $this->request->getPost('image-gallery'),
                'font' => $this->request->getPost('font'),
                'access' => 1,
            );

            // extrai a informação do ficheiro
            $string = file_get_contents(APPPATH. 'Base/category-'.$this->request->getPost('category').'.json');
            // faz o decode o json para uma variavel php que fica em array
            $json = json_decode($string, true);

            // aqui é onde adiciona a nova linha ao ao array assignment
            $json[] = $dadosArticle;

            // abre o ficheiro em modo de escrita
            $fp = fopen(APPPATH. 'Base/category-'.$this->request->getPost('category').'.json', 'w');
            // escreve no ficheiro em json
            fwrite($fp, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            // fecha o ficheiro
            fclose($fp);

            /*if ($this->blog->save($blog)) {
                $data['msgs'] = [
                    'message' => '<i class="fas fa-exclamation-triangle"></i> Parabéns! Blog criado com sucesso!',
                    'alert' => 'success'
                ];
                $data['title'] = 'Cadastrar Blog';
                $data['erro'] = '';

                return view('/admin/blog/cadastrar-blog', $data);
            }*/
            //return view('/admin/blog/cadastrar-blog', $data);
        }

        $datas['msgs'] = [
            'message' => '<i class="fa fa-exclamation-triangle"></i> Parabéns! Artigo criado com sucesso!',
            'alert' => 'success',
            
        ];

        $data = [
            'erro' => ''
        ];

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($datas);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');
    }
}
