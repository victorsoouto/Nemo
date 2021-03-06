<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Rotas de Autenticação
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::middleware('autorizacao')->group(function() {
    //Rotas de Piscicultura
    Route::get('/listar/pisciculturas', "PisciculturaController@listar")->name('piscicultura.listar');
    Route::get('/info/piscicultura/{id}',"PisciculturaController@informar")->name('piscicultura.informar');
    Route::get('/cadastrar/piscicultura', "PisciculturaController@cadastrar")->name('piscicultura.cadastrar');
    Route::post('/adicionarPiscicultura', "PisciculturaController@adicionar")->name('piscicultura.adicionar');
    Route::get('/editar/pisciculturas/{id}', "PisciculturaController@editar")->name('piscicultura.editar');
    Route::post('/salvarPiscicultura', "PisciculturaController@salvar")->name('piscicultura.salvar');
    Route::get('/remover/piscicultura/{id}', "PisciculturaController@remover")->name('piscicultura.remover');


    //Rotas de Gerenciador
    Route::get('listar/gerenciadores/piscicultura/{id}',"GerenciarController@listarGerenciadores")->name('gerenciador.listar');
    Route::get('adicionar/gerenciador/piscicultura/{id}',"GerenciarController@adicionarGerenciador")->name('gerenciador.adicionar');
    Route::post('inserirGerenciador',"GerenciarController@inserirGerenciador")->name('gerenciador.inserir');
    Route::get('/remover/gerenciador/{user_id}/piscicultura/{piscicultura_id}',  "GerenciarController@apagarGerenciador")->name('gerenciador.apagar');

    //Rotas de Tanque
    Route::get('/listar/tanques/{id}', "TanqueController@listar")->name('tanque.listar');
    Route::get('/cadastrar/tanque/{id}', "TanqueController@cadastrar")->name('tanque.cadastrar');
    Route::post('/adicionarTanque', "TanqueController@adicionar")->name('tanque.adicionar');
    Route::get('/editar/tanque/{id}', "TanqueController@editar")->name('tanque.editar');
    Route::post('/salvarTanque', "TanqueController@salvar")->name('tanque.salvar');
    Route::get('/remover/tanque/{id}', "TanqueController@remover")->name('tanque.remover');
    Route::post('/apagarTanque', "TanqueController@apagar")->name('tanque.apagar');
    Route::get('/tanque/{id}/detalhes', "TanqueController@exibirDetalhes")->name('tanque.detalhar');
    Route::get('/relatorios/tanque/{id}', "TanqueController@gerarRelatorios")->name('tanque.gerar.relatorio');

    //Rotas de Espécie
    Route::get('/listar/especies/{id}', "EspecieController@listar")->name('listarEspecies');
    Route::get('/adicionar/especie/{id}', "EspecieController@adicionar")->name('especie.adicionar');
    Route::post('/cadastrarEspecie', "EspecieController@cadastrar")->name('especie.cadastrar');
    Route::post('/salvarEspecie', "EspecieController@salvar")->name('especie.salvar');
    Route::get('/editar/tanque/{id}/especie/{especiePeixe_id}', "EspecieController@editar")->name('especie.editar');;
    Route::post('/apagarEspecie', "EspecieController@apagar")->name('especie.apagar');;
    Route::get('/remover/tanque/{id}/especie/{especiePeixe_id}', "EspecieController@remover")->name('especie.remover');;
    Route::get('/tanque/{id}/especie/{especiePeixe_id}/info', "EspecieController@informar")->name('especie.informar');;


    
    //Rotas de Sistema
    Route::get('/', 'PisciculturaController@listar')->name('home');
    Route::get('/home', 'PisciculturaController@listar')->name('home');
    
    //Rotas de Qualidade Água
    Route::get('/tanque/{id}/cadastrar/qualidadeAgua', "QualidadeAguaController@cadastrar")->name('qualidade.agua.cadastrar');
    Route::post('/adicionarQualidadeAgua', "QualidadeAguaController@adicionar")->name('qualidade.agua.adicionar');
    Route::get('/tanque/{id}/listar/qualidadesAgua', "QualidadeAguaController@listar")->name('qualidade.agua.listar');
    Route::get('/editar/qualidadeAgua/{id}', "QualidadeAguaController@editar")->name('qualidade.agua.editar');
    Route::post('/salvarQualidadeAgua', "QualidadeAguaController@salvar")->name('qualidade.agua.salvar');
    Route::post('/apagarQualidadeAgua', "QualidadeAguaController@apagar")->name('qualidade.agua.apagar');
    Route::get('/remover/qualidadeAgua/{id}', "QualidadeAguaController@remover")->name('qualidade.agua.remover');
    
    //Rotas de Povoamento
    Route::get('/povoar/tanque/{tanque_id}/especie/{especie_id}',  "PovoamentoController@povoarTanque")->name('povoamento.povoar');
    Route::post('/inserirPeixe', "PovoamentoController@inserirPeixe")->name('povoamento.inserir.peixe')->name('povoamento.inserir.peixe');
    Route::get('/info/tanque/{id}', "PovoamentoController@listar")->name('povoamento.listar');
    
    //Rotas de Pesca
    Route::get('/tanque/{tanque_id}/pesca/especie/{especiePeixe_id}/povoamento/{povoamento_id}', "PescaController@pesca")->name('pesca.pesca');
    Route::post('/pescarEspecie', "PescaController@pescar")->name('pescar.pescar');
    
    //Rotas de Escalonamento
    Route::get('/escalonamento/{id}', "EscalonamentoController@chamaEscalonamento")->name('escalonamento.chamar');
    Route::post('/calcularEscalonamento', "EscalonamentoController@calcularEscalonamento")->name('escalonamento.calcular');
});