<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\CepValidator;

class UsuarioEnrederoRequest extends FormRequest
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
            case 'api/usuario-endereco/cadastrar':
                $this->rules = [
                    'nome' => 'required|string|min:5|max:255',
                    'estado' => 'required|string|min:5|max:255',
                    'cidade' => 'required|string|min:5|max:255',
                    'cep' => ['required', new CepValidator, Rule::unique('usuario_enderecos')->where(function (Builder $query) {
                        return $query->where('usuario_id', "=", UsuarioEnrederoRequest::user()->id)->where('cep', '=', UsuarioEnrederoRequest::get('cep'));
                    })]
                ];
                break;
        }

        return $this->rules;
    }

    public function messages()
    {
        return [
            'cep.unique' => 'Este cep já está cadastrado cadastrado nessa conta.'
        ];
    }
}
