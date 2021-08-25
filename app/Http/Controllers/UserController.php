<?php

namespace Frota\Http\Controllers;

use Frota\Models\Motorista;
use Frota\Models\Usuario;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{
    private $populacao;
    private $conducao;

    public function __construct(Usuario $usuario2, Motorista $motorista2)
    {
        $this->populacao = $usuario2;
        $this->conducao = $motorista2;
    }

    public function lista()
    {

        $usuarios = DB::table('usuarios')->paginate(4);
        return view('administrativo')->with('usuarios', $usuarios);
    }

    public function mostrar($id)
    {

        $usuario = DB::select('select * from usuarios where id = ?', [$id]);
        return view('visualiza_usuario')->with('usuarios', $usuario);
    }

    public function mostrarSenha($id)
    {

        $usuario = DB::select('select * from usuarios where id = ?', [$id]);
        return view('trocarSenha')->with('usuarios', $usuario);
    
    }
    public function deletar($id, Request $request)
    {
        $usuario = Usuario::find($id);
        $request->session()->flash('status', 'O Usuario ' . $usuario->nome . ' foi removido com sucesso!');
        $usuario = DB::delete('delete from usuarios where id = ?', [$id]);
        return redirect('/funcionarios');
    }

    public function editar($id)
    {

        $usuario = DB::select('SELECT * FROM usuarios WHERE id = ?', [$id]);
        return view('ordinary.update_user')->with('usuarios', $usuario);
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

    public function search(Request $request){

        $usuarios = $this->populacao->search($request->search);
        return view('administrativo')->with('usuarios', $usuarios);
    }

    public function search2(Request $request){

        $motorista = $this->conducao->search($request->search2);
        return view('administrativo_moto')->with('motoristas', $motorista);
    }

}
