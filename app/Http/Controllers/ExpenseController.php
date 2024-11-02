<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function create_expense(Request $request)
    {
        $form_data = $request->validate([
            'amount'      => 'required',
            'description' => 'required|string|max:255',
            'category_id' => 'required'
        ]);
        $form_data['user_id'] = Auth::user()->id;
        return Expense::create($form_data);
    }

    public function get_expenses(Request $request)
    {
        $query = Expense::with(['category'])->where('user_id', Auth::user()->id);
        $chart_query = Category::leftJoin('expenses', 'categories.id', '=', 'expenses.category_id')
            ->select(
                'categories.id',
                'categories.title',
                DB::raw('SUM(expenses.amount) as total_amount')
            )
            ->where('expenses.user_id', Auth::user()->id)
            ->groupBy('categories.id', 'categories.title');

        if (isset($request['category_id']) && ! empty($request['category_id'])) {
            $query->where('category_id', $request['category_id']);
            $chart_query->where('expenses.category_id', $request['category_id']);
        }
        if (isset($request['start_date']) && ! empty($request['start_date'])) {
            $query->where('created_at', '>', $request['start_date']);
            $chart_query->where('expenses.created_at', '>', $request['start_date']);
        }
        if (isset($request['end_date']) && ! empty($request['end_date'])) {
            $query->where('created_at', '<', $request['end_date']);
            $chart_query->where('expenses.created_at', '<', $request['end_date']);
        }

        $expenses = $query->get();
        $chart_data = $chart_query->get();

        return [
            'expenses'   => $expenses,
            'chart_data' => $chart_data
        ];
    }

    public function get_expense($id)
    {
        if ($id) {
            $expense = Expense::find($id);
            if ($expense->user_id !== Auth::user()->id) {
                return;
            }
            return $expense;
        }
    }

    public function update_expense(Request $request, $id)
    {
        if ($id) {
            $expense = Expense::find($id);
            if ($expense->user_id !== Auth::user()->id) {
                return;
            }
            $form_data = $request->validate([
                'amount'      => 'required',
                'description' => 'required|string|max:255',
                'category_id' => 'required'
            ]);

            return $expense->update($form_data);
        }
    }

    public function delete_expense($id)
    {
        if ($id) {
            $expense = Expense::find($id);
            if ($expense) {
                if ($expense->user_id !== Auth::user()->id) {
                    return;
                }
                $expense->delete();
                return response()->json(['message' => 'Expense deleted successfully'], 200);
            }
        }
    }
}
