<?php

namespace App\Models\User;
namespace Frota\Http\Controllers;

use Frota\Models\Motorista;
use Frota\Models\Usuario as ModelsUsuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // Cadastro de usuarios comuns e administradores 
    public function registro(Request $request){
        $validation = Validator::make($request->all(),[
            'cpf' => 'required|max:50|unique:usuarios',
            'nome' => 'required|max:50',
            'endereco' => 'required|max:50',
            'telefone' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:50',
            'email' => 'email|unique:usuarios',
            'cep' => 'required|max:50',
            'password' => 'required|min:6',
            'nivel_de_acesso' => 'required|max:2' 
            ]);

        if($validation->fails()){
            return redirect('/cadastro')
            ->withInput()
            ->withErrors($validation);
        }
        
        $user = new ModelsUsuario();
        $user->cpf = $request->cpf;
        $user->nome = $request->nome;
        $user->endereco = $request->endereco;
        $user->cidade = $request->cidade;
        $user->cep = $request->cep;
        $user->telefone = $request->telefone;
        $user->estado = $request->estado;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nivel_de_acesso = $request->nivel_de_acesso;
        $user->save();

        return redirect('/funcionarios');
    }

    public function registroSocial(Request $request){
        //dd($request);
        $validation = Validator::make($request->all(),[
            'cpf' => 'required|max:50|unique:usuarios',
            'nome' => 'required|max:50',
            'endereco' => 'required|max:50',
            'telefone' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:50',
            'email' => 'email|unique:usuarios',
            'cep' => 'required|max:50',
            'password' => 'required|min:6',
            'nivel_de_acesso' => 'required|max:2' 
            ]);

        if($validation->fails()){
            dd($validation);
            return redirect('/cadastro')
            ->withInput()
            ->withErrors($validation);
        }
        
        $user = new ModelsUsuario();
        $user->fb_id = $request->fb_id;
        $user->cpf = $request->cpf;
        $user->nome = $request->nome;
        $user->endereco = $request->endereco;
        $user->cidade = $request->cidade;
        $user->cep = $request->cep;
        $user->telefone = $request->telefone;
        $user->estado = $request->estado;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nivel_de_acesso = $request->nivel_de_acesso;
        $user->save();
        
        return redirect()->route('loginSocial',[$request]);
    }
    // Login na tela principal do projeto 
    public function LoginUsuario(Request $request){
        //dd($request);
        $credenciais = $request->validate(
        [
            'cpf' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credenciais)){
            //pequisando o nivel de acesso para redirecionar para Dashboard correta
            $CPFsearch = ModelsUsuario::select('nivel_de_acesso')->where('cpf',$request->cpf)->first();
            $pesquisa = $CPFsearch['nivel_de_acesso'];
            
            if( $pesquisa === '1'){
                $request->session()->regenerate();
                // Pesquisando o nome para colocar no navBar
                $nomeSearch = ModelsUsuario::select('nome')->where('cpf',$request->cpf)->first();
                $nome = $nomeSearch['nome'];
                $request->session()->put('nome', $nome); 
                return redirect()->action([UserController::class,'lista']);
            }else{
                if ( $pesquisa === '2'){
                    $request->session()->regenerate();
                    // Pesquisando o nome para colocar no navBar
                    $nomeSearch = ModelsUsuario::select('nome')->where('cpf',$request->cpf)->first();
                    $nome = $nomeSearch['nome'];
                    $request->session()->put('nome', $nome); 
                    return redirect()->intended('usuario');
                }
                
            }
        }
        else{
            $request->session()->flash('status','Senha ou CPF não confere !!!');
            return redirect('/');
        }

    }
    // Cadastro de novos motoristas 
    public function registroMoto(Request $request){
        $validation = Validator::make($request->all(),[
            'cnh' => 'required|max:50|unique:motoristas',
            'nome' => 'required|max:50',
            'endereco' => 'required|max:50',
            'telefone' => 'required|max:50',
            'cidade' => 'required|max:50',
            'estado' => 'required|max:50',
            'cep' => 'required|max:50',
            'categoria' => 'required|max:2' 
        ]);
    
        if($validation->fails()){
            return redirect('/cadastroMoto')
            ->withInput()
            ->withErrors($validation);
        }
        
        $user = new Motorista();
        $user->cnh = $request->cnh;
        $user->nome = $request->nome;
        $user->endereco = $request->endereco;
        $user->cidade = $request->cidade;
        $user->cep = $request->cep;
        $user->telefone = $request->telefone;
        $user->estado = $request->estado;
        $user->categoria = $request->categoria;
        $user->save();

        return redirect('/funcionarios');
    }

    //sair do sessão 
    public function logout(){

        Auth::logout();
        return redirect('/');
    }


    public function updateSenhaUSuario(Request $request){

        $usuario = Auth::user();

        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->email = $request->input('email');

        if(!$request->input('password') ==''){
            $user = new ModelsUsuario();
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        $request->session()->flash('status','A senha foi atualizada com sucesso!!!');
        return redirect()->route('usuario');
    }
    
    public function updateSenhaADM($id, Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'repetirSenha' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect('/senha/$id')
                        ->withErrors($validator)
                        ->withInput();
        }

        //$usuario = DB::select('select * from usuarios where id = ?', [$id]);

        if(!$request->input('password') ==''){
            $user = ModelsUsuario::find($id);
            $user->password = bcrypt($request->input('password'));
 
        }
        //dd($user);
        $user->update();
        $request->session()->flash('status','A senha foi atualizada com sucesso!!!');
        return redirect()->back();
    }

    public function mostrarSenha($id)
    {

        $usuarios = DB::select('SELECT * FROM usuarios WHERE id = ?', [$id]);
        return view('trocaSenha')->with('usuarios', $usuarios);
    }
}
