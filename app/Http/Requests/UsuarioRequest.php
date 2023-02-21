<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    protected array $rules;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->path()) {
            case 'api/usuario/cadastrar':
                $this->rules = [
                    'nome' => 'required|string|min:3|max:255',
                    'email' => 'required|email:rfc,dns|unique:usuarios,email|min:5|max:255',
                    'senha' => 'required|string|min:6|max:255',
                    'confirmarSenha' => 'required|string|min:6|max:255|same:senha',
                    'dataNascimento' => 'required|date',
                    'cpf' => 'required|cpf|unique:usuarios,cpf'
                ];
                break;
            case 'api/usuario/logar':
                $this->rules = [
                    'email' => 'required|email:rfc,dns|min:5|max:255',
                    'senha' => 'required|string|min:6|max:255'
                ];
                break;
            default:
                $this->rules = [];
        }

        return $this->rules;
    }

    public function messages()
    {
        return [
            'email.unique' => 'Esse e-mail já está em uso.',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.unique' => 'Esse cpf já está em uso'
        ];
    }
}
