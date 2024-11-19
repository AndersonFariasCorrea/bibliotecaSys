<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Factory;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $request->search = preg_replace("/[^A-Za-z0-9\s]/", "", $request->search ?? '');

        return view('loan.index', [
            'loans' => Loan::getLoansByTerm($request->search),
            'search' => $request->search
        ]);
    }

    public function create(Request $request)
    {
        $requestMethod = $request->method();
        if ($requestMethod == 'GET') {
            return view('loan.create', [
                'users' => User::all() ?? [],
                'books' => Book::all() ?? []
            ]);
        } else if ($requestMethod == 'POST') {
            $request->validate([
                'user_id' => 'required',
                'book_id' => 'required',
                'end_date' => 'required|date|after:today',
            ],
            [
                'user_id.required' => __('loan.form_required.user_id'),
                'book_id.required' => __('loan.form_required.book_id'),
                'end_date.required' => __('loan.form_required.end_date'),
                'end_date.date' => __('loan.form_required.end_date_date'),
                'end_date.after' => __('loan.form_required.end_date_after'),
            ]);

            return Loan::createLoan($request->only(['user_id', 'book_id', 'end_date']));
        }
    }

    public function update(Request $request, int $id)
    {
        $requestMethod = $request->method();
        if ($requestMethod === 'GET') {
            $loan = Loan::getLoanById($id);
            return view('loan.edit', [
                'loan' => $loan,
                'users' => User::all() ?? [],
                'books' => Book::all() ?? [],
                'statuses' => Loan::getStatuses()
            ]);
        } else if ($requestMethod === 'PUT') {
            $request->validate([
                'end_date' => 'required|date',
                'status' => 'required|in:returned,not_due_yet,late'
            ],
            [
                'end_date.required' => __('loan.form_required.end_date'),
                'end_date.date' => __('loan.form_required.end_date_date'),
                'status.required' => __('loan.form_required.status'),
                'status.in' => __('loan.form_required.status_in'),
            ]);

            return Loan::updateLoan($request->only(['end_date', 'status']), $id);
        }
    }
}
