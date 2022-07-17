<?php

namespace App\Controllers;


use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Build extends BaseController
{
    public $erros = '';
    public $alocacao = '';    

    public function index($category)
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
        if(session()->get ('success')){           
            $msg = [
                'message'=>'<i class="fa fa-exclamation-triangle"></i> Parabéns! Artigo alterado com sucesso!',
                'alert' => 'success'
            ];
        }
        session()->destroy();

        $dataCategory = $this->category->getArticleMain($category);
        krsort($dataCategory);

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            "data" => $dataCategory,
            'category' => $category

        );


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');
    }
    public function create()
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
        //$dataCategoryWorld = $this->category->getArticleMain('world');

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            //"dataWorld" => $dataCategoryWorld,
        );


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/buildCreate');
    }
    public function edit($id, $category)
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
        $article = new ArticleModel();
        $dataCategory = $article->getById($id, $category);
       
        

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            'dataCategory' => $dataCategory,

        );

        $page = !$dataCategory['error'] ? 'buildEdit' : 'buildErro'; 

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/'.$page);
    }
    public function deleteArticle($id, $category)
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
        $article = new ArticleModel();
        $dataCategory = $article->getById($id, $category);
       
        

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            'dataCategory' => $dataCategory,

        );

        $page = !$dataCategory['error'] ? 'buildDelete' : 'buildErro'; 

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/'.$page);
    }
    public function editCategory($id, $category)
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
        $article = new ArticleModel();
        $dataCategory = $article->getById($id, $category);
       
        

        $data = array(
            'msgs' => $msg,
            'erro' => $this->erros,
            'dataCategory' => $dataCategory,

        );

        $page = !$dataCategory['error'] ? 'buildEditCategory' : 'buildErro'; 

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/'.$page);
    }

    public function del(){
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/build');
        }

        /*Busca o artigo*/
        $category = $this->request->getPost('category');
        
        /*Atualiza o arquivo*/
        $this->articleUpdate = new ArticleModel();
        
        //$this->articleUpdate->updateArticle($dataCategory, $this->request->getPost('category'));
        $delete = $this->articleUpdate->excluirArticle($this->request->getPost('id'), $category);
        
        session()->set([
            'success' => true,                
        ]);

        return redirect()->to('build/category/'.$category);
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
            $category = $this->request->getPost('category');
            $dataCategory = $this->category->getArticleMain($category);
            $dataArticle = [];

            foreach ($dataCategory as $key => $dados) {
                if ($dados['id'] === $this->request->getPost('id')) {
                    $dataCategory[$key]['id'] = $dados['id'];
                    $dataCategory[$key]['slug'] = $dados['slug'];
                    $dataCategory[$key]['title'] = $this->request->getPost('title');
                    $dataCategory[$key]['category'] = $dados['category'];
                    $dataCategory[$key]['date'] = $dados['date'];
                    $dataCategory[$key]['image-main'] = $dados['image-main'];
                    $dataCategory[$key]['resume'] = $this->request->getPost('resume');
                    $dataCategory[$key]['text'] = $this->request->getPost('text');
                    $dataCategory[$key]['text-second'] = $this->request->getPost('text-second');
                    $dataCategory[$key]['image-text-second'] = $dados['image-text-second'];
                    $dataCategory[$key]['quote'] = $this->request->getPost('quote');
                    $dataCategory[$key]['quote-author'] = $this->request->getPost('quote-author');
                    $dataCategory[$key]['image-video'] = $this->request->getPost('image-video');
                    $dataCategory[$key]['link-video'] = $this->request->getPost('link-video');
                    $dataCategory[$key]['title-video'] = $this->request->getPost('title-video');
                    $dataCategory[$key]['text-video'] = $this->request->getPost('text-video');
                    $dataCategory[$key]['image-gallery'] = createImageGallery($this->request->getPost('image-gallery'), $dados['slug']);
                    $dataCategory[$key]['font'] = $this->request->getPost('font');
                    $dataCategory[$key]['access'] = $dados['access'];
                    break;
                }
            }
            /*Atualiza o arquivo*/
            $this->articleUpdate = new ArticleModel();
            $this->articleUpdate->updateArticle($dataCategory, $this->request->getPost('category'));
        }

        $datas['msgs'] = [
            'message' => '<i class="fa fa-exclamation-triangle"></i> Parabéns! Artigo alterado com sucesso!',
            'alert' => 'success',

        ];

        $dataCategory = $this->category->getArticleMain($category);
        krsort($dataCategory);

        $data = [
            'erro' => '',
            "data" => $dataCategory,
            'category' => $category
        ];

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($datas);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');
    }
    public function updateCategory()
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
                'newCategory' => 'equalCategory[category]',
              
            ],
            [
               'newCategory' =>[
                      'equalCategory' => 'Ops! Categoria escolhida igual a anterior.'
                  ]  
                ],
               
        );
       
        //dd($val);
        if(!$val){ 
            return redirect()->back()->withInput()->with('erro', $this->validator);
        } else {            
            /*$blog['title'] = $this->request->getPost('title');
            $blog['text'] = $this->request->getPost('text');
            $blog['image-main'] = $this->request->getPost('image-main');
            $blog['data_postagem'] = date('d/m/Y');*/

            /*Busca o artigo*/
            
            $newCategory = $this->request->getPost('newCategory');
            $category = $this->request->getPost('category');
            $dataCategory = $this->category->getArticleMain($category);
            $dataArticle = [];

            foreach ($dataCategory as $key => $dados) {
                if ($dados['id'] === $this->request->getPost('id')) {
                    $dataArticle['id'] = $dados['id'];
                    $dataArticle['slug'] = $dados['slug'];
                    $dataArticle['title'] = $dados['title'];
                    $dataArticle['category'] = $newCategory;
                    $dataArticle['date'] = $dados['date'];
                    $dataArticle['image-main'] = $dados['image-main'];
                    $dataArticle['resume'] = $dados['resume'];
                    $dataArticle['text'] = $dados['text'];
                    $dataArticle['text-second'] = $dados['text-second'];
                    $dataArticle['image-text-second'] = $dados['image-text-second'];
                    $dataArticle['quote'] = $dados['quote'];
                    $dataArticle['quote-author'] = $dados['quote-author'];
                    $dataArticle['image-video'] = $dados['image-video'];
                    $dataArticle['link-video'] = $dados['link-video'];
                    $dataArticle['title-video'] = $dados['title-video'];
                    $dataArticle['text-video'] = $dados['text-video'];
                    $dataArticle['image-gallery'] = $dados['image-gallery'];
                    $dataArticle['font'] = $dados['font'];
                    $dataArticle['access'] = $dados['access'];
                    break;
                }
            }         
            /*Atualiza o arquivo*/
            $this->articleUpdate = new ArticleModel();
            $update = $this->articleUpdate->updateCategory($dataArticle,$category, $newCategory);
           
            //$this->articleUpdate->updateArticle($dataCategory, $this->request->getPost('category'));
            $delete = $this->articleUpdate->excluirArticle($this->request->getPost('id'), $category);
            
            session()->set([
                'success' => true,                
            ]);

            return redirect()->to('build/category/'.$newCategory);
        }

        $datas['msgs'] = [
            'message' => '<i class="fa fa-exclamation-triangle"></i> Parabéns! Artigo alterado com sucesso!',
            'alert' => 'success',

        ];

      
        /*$dataCategory = $this->category->getArticleMain($category);
        krsort($dataCategory);

        $data = [
            'erro' => '',
            "data" => $dataCategory,
            'category' => $category
        ];

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($datas);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('admin/build');*/
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
                'category'        => [
                    'required' => 'O campo CATEGORIA tem preenchimento obrigatório!'
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
                'slug' => removeCharacterSpecial(createSlug($this->request->getPost('title'))),
                'title' => $this->request->getPost('title'),
                'resume' => $this->request->getPost('resume'),
                'text' => $this->request->getPost('text'),
                'image-main' => removeCharacterSpecial(createSlug($this->request->getPost('title'))) . '-01.jpg',
                'category' => $this->request->getPost('category'),
                'text-second' => $this->request->getPost('text-second'),
                'image-text-second' => !empty($this->request->getPost('image-text-second')) ? removeCharacterSpecial(createSlug($this->request->getPost('title'))) . '-02.jpg' : '',
                'quote' => $this->request->getPost('quote'),
                'quote-author' => $this->request->getPost('quote-author'),
                'image-video' => $this->request->getPost('image-video'),
                'link-video' => $this->request->getPost('link-video'),
                'title-video' => $this->request->getPost('title-video'),
                'text-video' => $this->request->getPost('text-video'),
                'image-gallery' => createImageGallery($this->request->getPost('image-gallery'), removeCharacterSpecial(createSlug($this->request->getPost('title')))),
                'font' => $this->request->getPost('font'),
                'date' => !empty($this->request->getPost('date')) ? $this->request->getPost('date') : date('d/m/Y'),
                'access' => !empty($this->request->getPost('access')) ? $this->request->getPost('access') : 1

            );

            // extrai a informação do ficheiro
            $string = file_get_contents(defineUrlDb().'category-' . $this->request->getPost('category') . '.json');
            // faz o decode o json para uma variavel php que fica em array
            $json = json_decode($string, true);

            // aqui é onde adiciona a nova linha ao ao array assignment
            $json[] = $dadosArticle;

            // abre o ficheiro em modo de escrita
            $fp = fopen(defineUrlDb().'category-' . $this->request->getPost('category') . '.json', 'w');
            // escreve no ficheiro em json
            fwrite($fp, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            // fecha o ficheiro
            fclose($fp);

            //mkdir('./assets/img/codo',0775,true);
            /*if(!is_dir('././assets/img/world/casa')){
                mkdir('././assets/img/world/casa');
            }*/
            //$path='./assets/public/package/'.$package_id;

            $urlBaseImage = '././assets/img/' . $this->request->getPost('category') . '/' . removeCharacterSpecial(createSlug($this->request->getPost('title')));
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

            $new = file_get_contents(defineUrlDb().'categories.json');
            $json = json_decode($new, true);

            // aqui é onde adiciona a nova linha ao ao array assignment
            $dadosArticleNew = [
                'id' => $dadosArticle['id'],
                'category'=> $dadosArticle['category']
            ];
            $json[] = $dadosArticleNew;

            // abre o ficheiro em modo de escrita
            $fp2 = fopen(defineUrlDb().'categories.json', 'w');
            // escreve no ficheiro em json
            fwrite($fp2, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            // fecha o ficheiro
            fclose($fp2);
           
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
        return $parser->render('admin/buildCreate');
    }

    public function delete(string $id, string $category)
    {   
        $this->alocacao =  new ArticleModel();       
        $this->alocacao->excluirArticle($id, $category);

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
                //'link'         => 'required',
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
                /*'link'        => [
                    'required' => 'O campo LINK tem preenchimento obrigatório!'
                ],*/
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
            $arquivo = $this->request->getFile('arquivo');           

            $tipo = $arquivo->getMimeType();

            if ($tipo !== "application/pdf") {

                $datas['msgs'] = [
                    'message' => '<i class="fa fa-exclamation-triangle"></i> Erro! Tipo de arquivo não permitido!',
                    'alert' => 'danger',

                ];
            } else {                

                if ($arquivo->isValid()) {
                    $arquivo->move('./text/', $arquivo->getName());
                    
                    $dadosArticle = array(
                        'id' => generateId(10, false, false, true, false),
                        'title' => $this->request->getPost('title'),
                        'link' => '/text/' . $arquivo->getName(),
                        'date' => date('d/m/Y'),
                    );

                     // extrai a informação do ficheiro
            $string = file_get_contents(defineUrlDb().'school.json');
            // faz o decode o json para uma variavel php que fica em array
            $json = json_decode($string, true);



            // aqui é onde adiciona a nova linha ao ao array assignment
            $json[$this->request->getPost('type')][] = $dadosArticle;

            // abre o ficheiro em modo de escrita
            $fp = fopen(defineUrlDb().'school.json', 'w');
            // escreve no ficheiro em json
            fwrite($fp, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            // fecha o ficheiro
            fclose($fp);

        $datas['msgs'] = [
            'message' => '<i class="fa fa-exclamation-triangle"></i> Parabéns! Artigo criado com sucesso!',
            'alert' => 'success',

        ];

        
                }
            }

           
            //$filepath = base_url().'/assets/text/'.$arquivo->store();
            //$data = [
            //  'uploaded_fileinfo'=> new File($filepath)
            //];


           
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
