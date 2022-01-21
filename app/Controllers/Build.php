<?php

namespace App\Controllers;

use App\Models\WorldModel;
use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Build extends BaseController
{
    public $erros = '';
    public $article = '';
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
        $dataCategoryWorld = $this->category->getArticleMain('world');

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            "dataWorld" => $dataCategoryWorld,
        );


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');
    }
    public function edit($id)
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
        $world = new WorldModel();

        $dataCategoryWorld = $world->getById($id);

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            'dataWord' => $dataCategoryWorld,
        );


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/buildEdit');
    }
    public function update()
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
                //'image-main'         => 'required',
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
                /*'image-main'        => [
                    'required' => 'O campo IMAGEM PRINCIPAL tem preenchimento obrigatório!'
                ],*/
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

            /*Busca o artigo*/
            $dataCategory = $this->category->getArticleMain($this->request->getPost('category'));
            $dataArticle = [];            

            foreach ($dataCategory as $key => $dados) {
                if ($dados['id'] === $this->request->getPost('id')) {
                    $dataArticle[$key]['id'] = $dados['id'];
                    $dataArticle[$key]['title'] = $this->request->getPost('title');
                    $dataArticle[$key]['category'] = $dados['category'];
                    $dataArticle[$key]['date'] = $dados['date'];
                    $dataArticle[$key]['image-main'] = $dados['image-main'];
                    $dataArticle[$key]['resume'] = $this->request->getPost('resume');
                    $dataArticle[$key]['text'] = $this->request->getPost('text');
                    $dataArticle[$key]['text-second'] = $this->request->getPost('text-second');
                    $dataArticle[$key]['image-text-second'] = $dados['image-text-second'];
                    $dataArticle[$key]['quote'] = $this->request->getPost('quote');
                    $dataArticle[$key]['quote-author'] = $this->request->getPost('quote-author');
                    $dataArticle[$key]['image-video'] = $dados['image-video'];
                    $dataArticle[$key]['link-video'] = $this->request->getPost('link-video');
                    $dataArticle[$key]['title-video'] = $this->request->getPost('title-video');
                    $dataArticle[$key]['text-video'] = $this->request->getPost('text-video');
                    $dataArticle[$key]['image-gallery'] = $dados['image-gallery'];
                    $dataArticle[$key]['font'] = $this->request->getPost('font');
                    //$dataCategory[$key]['access'] = $dados['access'] + 1;
                    $dataArticle[$key]['access'] = $dados['access'] + 1;
                    break;
                }
            }           
            /*Atualiza o arquivo*/
            $this->articleUpdate = new ArticleModel();            
            $this->articleUpdate->updateArticle($dataArticle, $this->request->getPost('category'));

            
        }

        $datas['msgs'] = [
            'message' => '<i class="fa fa-exclamation-triangle"></i> Parabéns! Artigo criado com sucesso!',
            'alert' => 'success',

        ];

        $dataCategoryWorld = $this->category->getArticleMain('world');

       

        $data = [
            'erro' => '',
            "dataWorld" => $dataCategoryWorld,
        ];

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($datas);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');
    }
    public function buildSchool()
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
        return $parser->render('admin/buildSchool');
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
                //'image-main'         => 'required',
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
                /*'image-main'        => [
                    'required' => 'O campo IMAGEM PRINCIPAL tem preenchimento obrigatório!'
                ],*/
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
                'id' => generateId(10, false, false, true, false),
                'title' => $this->request->getPost('title'),
                'resume' => $this->request->getPost('resume'),
                'text' => $this->request->getPost('text'),
                'image-main' => createSlug($this->request->getPost('title')) . '-01.jpg',
                'category' => $this->request->getPost('category'),
                'date' => date('d/m/Y'),
                'text-second' => $this->request->getPost('text-second'),
                'image-text-second' => !empty($this->request->getPost('image-text-second')) ? createSlug($this->request->getPost('title')) . '-02.jpg' : '',
                'quote' => $this->request->getPost('quote'),
                'quote-author' => $this->request->getPost('quote-author'),
                'image-video' => $this->request->getPost('image-video'),
                'link-video' => $this->request->getPost('link-video'),
                'title-video' => $this->request->getPost('title-video'),
                'text-video' => $this->request->getPost('text-video'),
                'image-gallery' => createImageGallery($this->request->getPost('image-gallery'), createSlug($this->request->getPost('title'))),
                'font' => $this->request->getPost('font'),
                'access' => 1,
            );

            // extrai a informação do ficheiro
            $string = file_get_contents(APPPATH . 'Base/category-' . $this->request->getPost('category') . '.json');
            // faz o decode o json para uma variavel php que fica em array
            $json = json_decode($string, true);

            // aqui é onde adiciona a nova linha ao ao array assignment
            $json[] = $dadosArticle;

            // abre o ficheiro em modo de escrita
            $fp = fopen(APPPATH . 'Base/category-' . $this->request->getPost('category') . '.json', 'w');
            // escreve no ficheiro em json
            fwrite($fp, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            // fecha o ficheiro
            fclose($fp);

            //mkdir('./assets/img/codo',0775,true);
            /*if(!is_dir('././assets/img/world/casa')){
                mkdir('././assets/img/world/casa');
            }*/
            //$path='./assets/public/package/'.$package_id;

            $urlBaseImage = '././assets/img/' . $this->request->getPost('category') . '/' . createSlug($this->request->getPost('title'));
            //dd($urlBaseImage);
            if (!is_dir($urlBaseImage)) {
                $h = mkdir($urlBaseImage);
                chmod($urlBaseImage, 0777);
            }

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
    public function addSchool()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/buildSchool');
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
                'link'         => 'required',
                //'image-main'         => 'required',
                //'category'         => 'required',
                //'text'         => 'required|min_length[20]',
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
                'link'        => [
                    'required' => 'O campo LINK tem preenchimento obrigatório!'
                ],
                /*'image-main'        => [
                    'required' => 'O campo IMAGEM PRINCIPAL tem preenchimento obrigatório!'
                ],*/
                /*'text'        => [
                    'required' => 'O campo TEXTO tem preenchimento obrigatório!',
                    'min_length' => 'O campo TEXTO precisar tem no mínimo 20 caracteres!'
                ],*/
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
                'id' => generateId(10, false, false, true, false),
                'title' => $this->request->getPost('title'),
                'link' => $this->request->getPost('link'),
                'date' => date('d/m/Y'),
            );

            // extrai a informação do ficheiro
            $string = file_get_contents(APPPATH . 'Base/school.json');
            // faz o decode o json para uma variavel php que fica em array
            $json = json_decode($string, true);



            // aqui é onde adiciona a nova linha ao ao array assignment
            $json[$this->request->getPost('type')][] = $dadosArticle;

            // abre o ficheiro em modo de escrita
            $fp = fopen(APPPATH . 'Base/school.json', 'w');
            // escreve no ficheiro em json
            fwrite($fp, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            // fecha o ficheiro
            fclose($fp);

            //mkdir('./assets/img/codo',0775,true);
            /*if(!is_dir('././assets/img/world/casa')){
                mkdir('././assets/img/world/casa');
            }*/
            //$path='./assets/public/package/'.$package_id;



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
        return $parser->render('admin/buildSchool');
    }
}
