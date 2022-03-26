<?php

namespace Frota\Http\Controllers;

use Frota\Models\Event;
use Frota\Models\Escola;
use Frota\Models\Motorista;
use Frota\Models\Usuario;
use Frota\Models\Veiculo;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $populacao;
    private $conducao;
    private $car;
    private $school;

    public function __construct(Usuario $usuario2, Motorista $motorista2, Veiculo $car, Escola $school)
    {
        $this->populacao = $usuario2;
        $this->conducao = $motorista2;
        $this->car = $car;
        $this->school = $school;
    }
    //cadastro de Escola
    public function registroEscola(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nome_da_escola' => 'required|max:50|unique:escolas',
            'diretor' => 'required|max:50',
            'ViceDiretor' => 'required|max:50',
            'email' => 'email|unique:escolas',
            'endereco' => 'required|max:50',
            'telefone' => 'required|max:50',
        ]);

        if ($validation->fails()) {
            return redirect('/cad_escola')
                ->withInput()
                ->withErrors($validation);
        }

        $school = new Escola();
        $school->nome_da_escola = $request->nome_da_escola;
        $school->diretor = $request->diretor;
        $school->ViceDiretor = $request->ViceDiretor;
        $school->email = $request->email;
        $school->endereco = $request->endereco;
        $school->telefone = $request->telefone;
        $school->save();

        return redirect('/escolas');
    }
    //cadastro de veiculos
    public function registroVeiculo(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'marcaModelo' => 'required|max:50',
            'tipoVeiculo' => 'required|max:50',
            'especie' => 'required|max:50',
            'categoria' => 'required|max:50',
            'capacidade' => 'required|max:50',
            'placa' => 'required|max:50|unique:veiculos',
        ]);

        if ($validation->fails()) {
            return redirect('/cad_car')
                ->withInput()
                ->withErrors($validation);
        }

        $car = new Veiculo();
        $car->marcaModelo = $request->marcaModelo;
        $car->tipoVeiculo = $request->tipoVeiculo;
        $car->especie = $request->especie;
        $car->categoria = $request->categoria;
        $car->capacidade = $request->capacidade;
        $car->placa = $request->placa;
        $car->save();

        return redirect('/veiculos');
    }
    //listagem de usuarios cadastrados
    public function lista()
    {
        $usuarios = Usuario::paginate(3);

        return view('administrativo', ['usuarios' => $usuarios]);
    }
    //Listagem do escolas cadastradas
    public function listaEscola()
    {
        $escolas = Escola::paginate(3);
        //dd($usuarios->items);
        return view('administrativo_escolas', ['escolas' => $escolas]);
    }

    public function listaVeiculo()
    {
        $veiculos = Veiculo::paginate(3);
        //dd($usuarios->items);
        return view('administrativo_veiculo', ['veiculos' => $veiculos]);
    }

    public function mostrar($id)
    {
        $usuario = DB::select('select * from usuarios where id = ?', [$id]);
        return view('visualiza_usuario')->with('usuarios', $usuario);
    }

    public function mostrarEscola($id)
    {
        $escola = DB::select('select * from escolas where id = ?', [$id]);
        return view('visualiza_escola')->with('escolas', $escola);
    }

    public function mostrarVeiculo($id)
    {
        $veiculos = DB::select('select * from veiculos where id = ?', [$id]);
        return view('visualiza_veiculo')->with('veiculos', $veiculos);
    }
    //troca a senha do usuario de acesso
    public function mostrarSenha($id)
    {

        $usuario = DB::select('select * from usuarios where id = ?', [$id]);
        return view('trocarSenha')->with('usuarios', $usuario);
    }
    //Deleta o usuario ja cadastrado.
    public function deletar($id, Request $request)
    {
        $usuario = Usuario::find($id);
        $request->session()->flash('status', 'O Usuario ' . $usuario->nome . ' foi removido com sucesso!');
        $usuario = DB::delete('delete from usuarios where id = ?', [$id]);
        return redirect('/funcionarios');
    }
    //Deleta a escola ja cadastrada
    public function deletarEscola($id, Request $request)
    {
        $escola = Escola::find($id);
        $request->session()->flash('status', 'O Usuario ' . $escola->nomeEscola . ' foi removido com sucesso!');
        $escola = DB::delete('delete from escolas where id = ?', [$id]);
        return redirect('/escolas');
    }

    public function deletarVeiculo($id, Request $request)
    {
        $veiculo = Escola::find($id);
        $request->session()->flash('status', 'O Usuario ' . $veiculo->nomeEscola . ' foi removido com sucesso!');
        $escola = DB::delete('delete from veiculos where id = ?', [$id]);
        return redirect('/veiculos');
    }

    public function editar($id)
    {
        $usuario = DB::select('SELECT * FROM usuarios WHERE id = ?', [$id]);
        return view('ordinary.update_user')->with('usuarios', $usuario);
    }

    public function editarEscola($id)
    {
        $escola = DB::select('SELECT * FROM escolas WHERE id = ?', [$id]);
        return view('ordinary.update_escola')->with('escolas', $escola);
    }

    public function editarVeiculo($id)
    {
        $veiculos = DB::select('SELECT * FROM veiculos WHERE id = ?', [$id]);
        return view('ordinary.update_veiculo')->with('veiculos', $veiculos);
    }

    public function atualizar(Request $request, $id)
    {

        $usua = Usuario::find($id);
        if (isset($usua)) {
            $usua->cpf = $request->input('cpf');
            $usua->nome = $request->input('nome');
            $usua->endereco = $request->input('endereco');
            $usua->cidade = $request->input('cidade');
            $usua->cep = $request->input('cep');
            $usua->telefone = $request->input('telefone');
            $usua->estado = $request->input('estado');
            $usua->email = $request->input('email');
            if ($usua['password'] != null) {
                $usua->password = $request->input('password');
            }
            $usua->nivel_de_acesso = $request->input('nivel_de_acesso');
            $usua->save();
            return redirect('/funcionarios')->with('success', 'Usuario atualizado com sucesso !!!');
        }
    }

    public function atualizarEscola(Request $request, $id)
    {

        $esco = Escola::find($id);
        if (isset($esco)) {
            $esco->nome_da_escola = $request->input('nome_da_escola');
            $esco->diretor = $request->input('diretor');
            $esco->ViceDiretor = $request->input('ViceDiretor');
            $esco->email = $request->input('email');
            $esco->endereco = $request->input('endereco');
            $esco->telefone = $request->input('telefone');
            $esco->save();
            return redirect('/escolas')->with('success', 'Escola atualizado com sucesso !!!');
        }
    }

    public function atualizarVeiculo(Request $request, $id)
    {

        $car = Veiculo::find($id);
        if (isset($car)) {
            $car->nome_da_escola = $request->input('nome_da_escola');
            $car->diretor = $request->input('diretor');
            $car->ViceDiretor = $request->input('ViceDiretor');
            $car->email = $request->input('email');
            $car->endereco = $request->input('endereco');
            $car->telefone = $request->input('telefone');
            $car->save();
            return redirect('/veiculos')->with('success', 'Veiculo atualizado com sucesso !!!');
        }
    }

    //REFERENTE AO CADASTRO DO MOTORISTA

    public function listarMoto()
    {

        $motoristas = DB::table('motoristas')->paginate(4);
        return view('administrativo_moto')->with('motoristas', $motoristas);
    }

    public function mostrarMoto($id)
    {

        $motorista = DB::select('SELECT * FROM motoristas WHERE id = ?', [$id]);
        return view('visualiza_moto')->with('motoristas', $motorista);
    }

    public function deletaMoto($id, Request $request)
    {

        $motorista = Motorista::find($id);
        $request->session()->flash('status', 'O Usuario ' . $motorista->nome . ' foi removido com sucesso!');
        $motorista = DB::delete('DELETE FROM motoristas WHERE id = ?', [$id]);
        return redirect('/motorista');
    }

    public function editaMoto($id)
    {

        $motorista = DB::select('SELECT * FROM motoristas WHERE id = ?', [$id]);
        return view('ordinary.update_moto')->with('motoristas', $motorista);
    }

    public function atualizarMoto(Request $request, $id)
    {

        $moto = Motorista::find($id);
        if (isset($moto)) {
            $moto->cnh = $request->input('cnh');
            $moto->nome = $request->input('nome');
            $moto->endereco = $request->input('endereco');
            $moto->cidade = $request->input('cidade');
            $moto->cep = $request->input('cep');
            $moto->telefone = $request->input('telefone');
            $moto->estado = $request->input('estado');
            $moto->categoria = $request->input('categoria');
            $moto->save();
            $request->session()->flash('status', 'Motorista ' . $moto->nome . ' Atualizado com sucesso !!!');
            return redirect('/motorista');
        }
    }

    public function perfil(Request $request)
    {
        $verUser = Usuario::whereCpf($request->cpf)->first();

        if ($verUser) {

            $camposRepetidos = [];

            if ($verUser->cpf === $request->cpf) {
                $camposRepetidos[] = 'CPF';
            }

            $mensagem = 'Um usuário já existe na base de dados. 
           Verifique os seguintes campos: ' . implode(',', $camposRepetidos);

            $request->session()->flash('alert-error', $mensagem);
            return redirect()->back($request);
        }
        return redirect('/registrar');
    }

    public function perfil1(Request $request)
    {
        $verEsco = Escola::where($request->email)->first();

        if ($verEsco) {

            $camposRepetidos = [];

            if ($verEsco->email === $request->email) {
                $camposRepetidos[] = 'email';
            }

            $mensagem = 'Um email já existe na base de dados. 
           Verifique os seguintes campos: ' . implode(',', $camposRepetidos);

            $request->session()->flash('alert-error', $mensagem);
            return redirect()->back($request);
        }
        return redirect('/registrarEscola');
    }

    public function perfil2(Request $request)
    {
        $verCar = Veiculo::where($request->placa)->first();

        if ($verCar) {

            $camposRepetidos = [];

            if ($verCar->placa === $request->placa) {
                $camposRepetidos[] = 'placa';
            }

            $mensagem = 'Um Placa já existe na base de dados. 
           Verifique os seguintes campos: ' . implode(',', $camposRepetidos);

            $request->session()->flash('alert-error', $mensagem);
            return redirect()->back($request);
        }
        return redirect('/registrarVeiculo');
    }
    //busca pelo nome do usuario
    public function search(Request $request)
    {
        $usuarios = $this->populacao->search($request->search);
        return view('administrativo')->with('usuarios', $usuarios);
    }
    //busca pelo nome do motorista 
    public function search2(Request $request)
    {
        $motorista = $this->conducao->search($request->search);
        return view('administrativo_moto')->with('motoristas', $motorista);
    }
    //busca pelo nome do escola 
    public function search3(Request $request)
    {
        $escola = $this->school->search($request->search);
        return view('administrativo_escolas')->with('escolas', $escola);
    }
    //busca pelo nome do veiculo
    public function search4(Request $request)
    {
        $veiculo = $this->car->search($request->search);
        return view('administrativo_veiculo')->with('veiculos', $veiculo);
    }
}
