<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            case 'api/produtos/cadastrar':
                $this->rules = [
                    'nome' => 'required|string|max:255|min:5',
                    'descricao' => 'required|string|min:10',
                    'preco' => 'required|numeric',
                    'quantidade_estoque' => 'required|integer',
                    'categoria_produto_id' => 'required|integer'
                ];
                break;
            case 'api/produtos/atualizar':
                $this->rules = [
                    'id' => 'required|integer',
                    'nome' => 'required|string|max:255|min:5',
                    'descricao' => 'required|string|min:10',
                    'preco' => 'required|numeric',
                    'quantidade_estoque' => 'required|integer',
                    'categoria_produto_id' => 'required|integer'
                ];
                break;
            case 'api/produtos/exibir':
            case 'api/produtos/deletar':
                $this->rules = [
                    'id' => 'required|integer'
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
            'id.required' => 'O objeto não pode ser nulo.',
            'id.integer' => 'Objeto inválido.',
        ];
    }
}
