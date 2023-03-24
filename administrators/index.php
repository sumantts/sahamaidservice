<?php
	include('assets/php/sql_conn.php');	
	
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}else{
		$p = '';
	}
	
	if(isset($_GET["gr"])){
		$gr = $_GET["gr"];
	}else{
		$gr = '';
	}
    
	$title = '';

	switch($p){
		case 'signin':
        $title = "Signin";
		include('signin/signin.php');
		break;

		case 'signup':
        $title = "Signup";
		include('signup/signup.php');
		break;
		
		case 'dashboard':
		$title = "Dashboard";
		include('dashboard/dashboard.php');		
		break;

		//SETUP		
		case 'organisation':
			$title = "Organisation";
			include('setup/organisation/organisation.php');		
		break;
		
		case 'deposit':
			$title = "Deposit";
			include('setup/product/deposit/deposit.php');		
		break;
		
		case 'loan':
			$title = "Loan";
			include('setup/product/loan/loan.php');		
		break;
		
		case 'member':
			$title = "Member";
			include('setup/profile/member/member.php');		
		break;
		
		case 'group':
			$title = "Group";
			include('setup/profile/group/group.php');		
		break;
		
		case 'staff':
			$title = "Staff";
			include('setup/profile/staff/staff.php');		
		break;
		
		case 'member_kyc_form':
			$title = "Member KYC Form";
			include('setup/profile/member_kyc_form/member_kyc_form.php');		
		break;
		
		case 'commission_setup':
			$title = "Commission Setup";
			include('setup/commission_setup/commission_setup.php');		
		break;
		
		case 'extra_information':
			$title = "Extra Information";
			include('setup/extra_information/extra_information.php');		
		break;

		//FEATURES	
		case 'create_new_savings_ac':
			$title = "Create New Savings A/c";
			include('features/voluntary_savings/create_new_savings_ac/create_new_savings_ac.php');		
		break;
		
		case 'create_new_td_ac':
			$title = "Create New TD A/c";
			include('features/voluntary_savings/create_new_td_ac/create_new_td_ac.php');		
		break;	

		case 'features_deposit':
			$title = "Deposit";
			include('features/voluntary_savings/operation/deposit/deposit.php');		
		break;

		case 'features_withdrawal':
			$title = "Withdrawal";
			include('features/voluntary_savings/operation/withdrawal/withdrawal.php');		
		break;

		case 'term_deposit_renewal':
			$title = "Term Deposit Renewal";
			include('features/voluntary_savings/operation/term_deposit_renewal/term_deposit_renewal.php');		
		break;

		case 'close_savings_ac':
			$title = "Close Savings A/c";
			include('features/voluntary_savings/operation/close_savings_ac/close_savings_ac.php');		
		break;

		case 'savings_interest':
			$title = "Savings Interest";
			include('features/voluntary_savings/interest_calculation/savings_interest/savings_interest.php');		
		break;

		case 'td_interest_payable':
			$title = "T/D  Interest Payable";
			include('features/voluntary_savings/interest_calculation/td_interest_payable/td_interest_payable.php');		
		break;

		case 'td_interest_paid':
			$title = "T/D Interest Paid";
			include('features/voluntary_savings/interest_calculation/td_interest_paid/td_interest_paid.php');		
		break;

		case 'balance_enquery':
			$title = "Balance Enquery";
			include('features/voluntary_savings/balance_enquery/balance_enquery.php');		
		break;

		case 'submit_15G_15H':
			$title = "Submit 15G/15H";
			include('features/voluntary_savings/submit_15G_15H/submit_15G_15H.php');		
		break;

		case 'opening_share_ac':
			$title = "Opening Share A/c";
			include('features/mandatory_savings/opening_share_ac/opening_share_ac.php');		
		break;

		case 'opening_gurrantee_fund_ac':
			$title = "Opening Gurrantee Fund A/c";
			include('features/mandatory_savings/opening_gurrantee_fund_ac/opening_gurrantee_fund_ac.php');		
		break;

		case 'transactions':
			$title = "Transactions";
			include('features/mandatory_savings/transactions/transactions.php');		
		break;

		case 'loan_eligibility':
			$title = "Loan Eligibility";
			include('features/loan/loan_eligibility/loan_eligibility.php');		
		break;

		case 'new_loan_application':
			$title = "New Loan Application";
			include('features/loan/new_loan_application/new_loan_application.php');		
		break;

		case 'savings_assignment_to_loan':
			$title = "Savings Assignment to Loan";
			include('features/loan/savings_assignment_to_loan/savings_assignment_to_loan.php');		
		break;

		case 'loan_disbursement':
			$title = "Loan Disbursement";
			include('features/loan/operation/loan_disbursement/loan_disbursement.php');		
		break;

		case 'loan_repayment':
			$title = "Loan Repayment";
			include('features/loan/operation/loan_repayment/loan_repayment.php');		
		break;

		case 'balance_enquiry':
			$title = "Balance Enquiry";
			include('features/loan/operation/balance_enquiry/balance_enquiry.php');		
		break;

		case 'interest_subvention':
			$title = "Interest Subvention";
			include('features/loan/operation/interest_subvention/interest_subvention.php');		
		break;

		case 'loan_rescheduling':
			$title = "Loan Rescheduling";
			include('features/loan/operation/loan_rescheduling/loan_rescheduling.php');		
		break;

		//ACCOUNTS
		case 'create_chart_of_ac':
			$title = "Create Chart of A/c";
			include('accounts/setup/create_chart_of_ac/create_chart_of_ac.php');		
		break;

		case 'create_ledger':
			$title = "Create Ledger";
			include('accounts/setup/create_ledger/create_ledger.php');		
		break;

		case 'transaction_ac_setup':
			$title = "Transaction A/c Setup";
			include('accounts/setup/transaction_ac_setup/transaction_ac_setup.php');		
		break;

		case 'voucher_entry':
			$title = "Voucher Entry";
			include('accounts/voucher/voucher_entry/voucher_entry.php');		
		break;

		case 'voucher_approval':
			$title = "Voucher Approval";
			include('accounts/voucher/voucher_approval/voucher_approval.php');		
		break;

		case 'agent_commission_calculation':
			$title = "Agent Commission Calculation";
			include('accounts/voucher/agent_commission_calculation/agent_commission_calculation.php');		
		break;

		case 'collection_list':
			$title = "Collection List";
			include('accounts/app_based_collection/collection_list/collection_list.php');		
		break;

		case 'posting_collection':
			$title = "Posting Collection";
			include('accounts/app_based_collection/posting_collection/posting_collection.php');		
		break;

		case 'disbursement_update':
			$title = "Disbursement Update";
			include('accounts/modify_entry/disbursement_update/disbursement_update.php');		
		break;

		case 'savings_transaction_update':
			$title = "Savings Transaction Update";
			include('accounts/modify_entry/savings_transaction_update/savings_transaction_update.php');		
		break;

		case 'loan_transaction_update':
			$title = "Loan Transaction Update";
			include('accounts/modify_entry/loan_transaction_update/loan_transaction_update.php');		
		break;

		case 'voucher_update':
			$title = "Voucher Update";
			include('accounts/modify_entry/voucher_update/voucher_update.php');		
		break;

		case 'share_gf_update':
			$title = "Share/GF Update";
			include('accounts/modify_entry/share_gf_update/share_gf_update.php');		
		break;

		//CLOSING
		case 'daily_closing':
			$title = "Daily Closing";
			include('closing/daily_closing/daily_closing.php');		
		break;
		
		case 'yearly_closing':
			$title = "Yearly Closing";
			include('closing/yearly_closing/yearly_closing.php');		
		break;

		//REPORTS
		case 'shg_register':
			$title = "SHG Register";
			include('reports/customer/shg/shg_register/shg_register.php');		
		break;
		
		case 'membership_register':
			$title = "Membership Register";
			include('reports/customer/member/membership_register/membership_register.php');		
		break;
		
		case 'share_register':
			$title = "Share Register";
			include('reports/customer/member/share_register/share_register.php');		
		break;
		
		case 'gurrantee_fund_register':
			$title = "Gurrantee Fund Register";
			include('reports/customer/member/gurrantee_fund_register/gurrantee_fund_register.php');		
		break;
		
		case 'member_share_ledger':
			$title = "Member Share Ledger";
			include('reports/customer/member/member_share_ledger/member_share_ledger.php');		
		break;
		
		case 'member_gf_ledger':
			$title = "Member GF Ledger";
			include('reports/customer/member/member_gf_ledger/member_gf_ledger.php');		
		break;
		
		case 'ac_statement':
			$title = "A/c Statement";
			include('reports/savings/ac_statement/ac_statement.php');		
		break;
		
		case 'transaction_register':
			$title = "Transaction Register";
			include('reports/savings/transaction_register/transaction_register.php');		
		break;
		
		case 'interest_paid_register':
			$title = "Interest Paid Register";
			include('reports/savings/interest_paid_register/interest_paid_register.php');		
		break;
		
		case 'term_deposit_register':
			$title = "Term Deposit Register";
			include('reports/savings/term_deposit_register/term_deposit_register.php');		
		break;
		
		case 'maturity_register':
			$title = "Maturity Register";
			include('reports/savings/maturity_register/maturity_register.php');		
		break;
		
		case 'closed_register':
			$title = "Closed Register";
			include('reports/savings/closed_register/closed_register.php');		
		break;
		
		case 'disbursement_register':
			$title = "Disbursement Register";
			include('reports/loan/disbursement_register/disbursement_register.php');		
		break;
		
		case 'repayment_schedule':
			$title = "Repayment Schedule";
			include('reports/loan/repayment_schedule/repayment_schedule.php');		
		break;
		
		case 'report_transaction_register':
			$title = "Transaction Register";
			include('reports/loan/transaction_register/transaction_register.php');		
		break;
		
		case 'reports_ac_statement':
			$title = "A/c Statement";
			include('reports/loan/ac_statement/ac_statement.php');		
		break;
		
		case 'prepayment_register':
			$title = "Prepayment Register";
			include('reports/loan/prepayment_register/prepayment_register.php');		
		break;
		
		case 'reports_closed_register':
			$title = "Closed Register";
			include('reports/loan/closed_register/closed_register.php');		
		break;
		
		case 'defaulter_od_register':
			$title = "Defaulter/OD Register";
			include('reports/loan/defaulter_od_register/defaulter_od_register.php');		
		break;
		
		case 'user_savings_scroll':
			$title = "User Savings Scroll";
			include('reports/scroll/user_savings_scroll/user_savings_scroll.php');		
		break;
		
		case 'user_loan_scroll':
			$title = "User Loan Scroll";
			include('reports/scroll/user_loan_scroll/user_loan_scroll.php');		
		break;
		
		case 'user_scroll_summary':
			$title = "User Scroll Summary";
			include('reports/scroll/user_scroll_summary/user_scroll_summary.php');		
		break;
		
		case 'savings_detailed_list':
			$title = "Savings Detailed List";
			include('reports/detail_list/savings_detailed_list/savings_detailed_list.php');		
		break;
		
		case 'loan_detailed_list':
			$title = "Loan Detailed List";
			include('reports/detail_list/loan_detailed_list/loan_detailed_list.php');		
		break;
		
		case 'loan_od_detailed_list':
			$title = "Loan OD Detailed List";
			include('reports/detail_list/loan_od_detailed_list/loan_od_detailed_list.php');		
		break;
		
		case 'npa_list':
			$title = "NPA List";
			include('reports/detail_list/npa_list/npa_list.php');		
		break;
		
		case 'cash_book':
			$title = "Cash Book";
			include('reports/accounts/cash_book/cash_book.php');		
		break;
		
		case 'cash_account':
			$title = "Cash Account";
			include('reports/accounts/cash_account/cash_account.php');		
		break;
		
		case 'bank_account':
			$title = "Bank Account";
			include('reports/accounts/bank_account/bank_account.php');		
		break;
		
		case 'journal_book':
			$title = "Journal Book";
			include('reports/accounts/journal_book/journal_book.php');		
		break;
		
		case 'accounts_ledger':
			$title = "Accounts Ledger";
			include('reports/accounts/accounts_ledger/accounts_ledger.php');		
		break;
		
		case 'trial_balance':
			$title = "Trial Balance";
			include('reports/accounts/trial_balance/trial_balance.php');		
		break;
		
		case 'profit_loss_ac':
			$title = "Profit & Loss A/c";
			include('reports/accounts/profit_loss_ac/profit_loss_ac.php');		
		break;
		
		case 'pl_appropriation_ac':
			$title = "P/L Appropriation A/c";
			include('reports/accounts/pl_appropriation_ac/pl_appropriation_ac.php');		
		break;
		
		case 'balance_sheet':
			$title = "Balance Sheet";
			include('reports/accounts/balance_sheet/balance_sheet.php');		
		break;
		
		case 'staff_list':
			$title = "Staff List";
			include('reports/miscellaneous/staff_list/staff_list.php');		
		break;
		
		case 'agent_performance':
			$title = "Agent Performance";
			include('reports/miscellaneous/agent_performance/agent_performance.php');		
		break;
		
		case 'agent_commission_register':
			$title = "Agent Commission Register";
			include('reports/miscellaneous/agent_commission_register/agent_commission_register.php');		
		break;
		
		case 'backup_db':
			$title = "Backup DB";
			include('utility/backup_db/backup_db.php');		
		break;
				
		default:
		include('signin/signin.php');
	}
    

?>