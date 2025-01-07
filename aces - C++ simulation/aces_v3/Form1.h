#include<iostream>
#include<string>
#include <mysql_driver.h>
#include <mysql_connection.h>
#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/statement.h>
#include <ctime>
#include <sstream>
#include <list>

#include "Converters.h"
#pragma once

namespace CppCLRWinFormsProject {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;
	using namespace std;
	using System::Runtime::InteropServices::Marshal;//For String^ conversion

	/// <summary>
	/// Summary for Form1
	/// </summary>
	public ref class Form1 : public System::Windows::Forms::Form
	{
	public:
		Form1(void)
		{
			InitializeComponent();
			//
			//TODO: Add the constructor code here
			//
		}

	protected:
		/// <summary>
		/// Clean up any resources being used.
		/// </summary>
		~Form1()
		{
			if (components)
			{
				delete components;
			}
		}
	private: System::Windows::Forms::Button^ reset_btn;
	protected:
	private: System::Windows::Forms::Button^ card_btn;
	private: System::Windows::Forms::Button^ handle_btn;
	private: System::Windows::Forms::Panel^ panel6;


	private:
	private: System::Windows::Forms::Label^ label6;
	public:
	public: System::Windows::Forms::RichTextBox^ general_message_txt;
	private:
	private: System::Windows::Forms::Panel^ door_pnl;
	public:
	private: System::Windows::Forms::Label^ label5;
	private: System::Windows::Forms::Panel^ card_reader_pnl;
	private: System::Windows::Forms::Label^ label4;
	private: System::Windows::Forms::Panel^ door_lock_pnl;
	private: System::Windows::Forms::Label^ label3;
	private: System::Windows::Forms::Panel^ panel2;
	private: System::Windows::Forms::TextBox^ card_id_txt;
	private: System::Windows::Forms::Label^ label2;
	private: System::Windows::Forms::Panel^ panel1;
	private: System::Windows::Forms::TextBox^ door_id_txt;
	private: System::Windows::Forms::Label^ label1;
	private: System::Windows::Forms::Panel^ panel3;

	private: System::Windows::Forms::Label^ label8;
	private: System::Windows::Forms::DateTimePicker^ time_input;
	private: System::Windows::Forms::DateTimePicker^ date_input;
	private: System::Windows::Forms::Label^ label9;
	private: System::Windows::Forms::Timer^ timer;

	private: System::ComponentModel::IContainer^ components;




	private:
		/// <summary>
		/// Required designer variable.
		/// </summary>


#pragma region Windows Form Designer generated code
		/// <summary>
		/// Required method for Designer support - do not modify
		/// the contents of this method with the code editor.
		/// </summary>
		void InitializeComponent(void)
		{
			this->components = (gcnew System::ComponentModel::Container());
			this->reset_btn = (gcnew System::Windows::Forms::Button());
			this->card_btn = (gcnew System::Windows::Forms::Button());
			this->handle_btn = (gcnew System::Windows::Forms::Button());
			this->panel6 = (gcnew System::Windows::Forms::Panel());
			this->label6 = (gcnew System::Windows::Forms::Label());
			this->general_message_txt = (gcnew System::Windows::Forms::RichTextBox());
			this->door_pnl = (gcnew System::Windows::Forms::Panel());
			this->label5 = (gcnew System::Windows::Forms::Label());
			this->card_reader_pnl = (gcnew System::Windows::Forms::Panel());
			this->label4 = (gcnew System::Windows::Forms::Label());
			this->door_lock_pnl = (gcnew System::Windows::Forms::Panel());
			this->label3 = (gcnew System::Windows::Forms::Label());
			this->panel2 = (gcnew System::Windows::Forms::Panel());
			this->card_id_txt = (gcnew System::Windows::Forms::TextBox());
			this->label2 = (gcnew System::Windows::Forms::Label());
			this->panel1 = (gcnew System::Windows::Forms::Panel());
			this->door_id_txt = (gcnew System::Windows::Forms::TextBox());
			this->label1 = (gcnew System::Windows::Forms::Label());
			this->panel3 = (gcnew System::Windows::Forms::Panel());
			this->date_input = (gcnew System::Windows::Forms::DateTimePicker());
			this->label9 = (gcnew System::Windows::Forms::Label());
			this->time_input = (gcnew System::Windows::Forms::DateTimePicker());
			this->label8 = (gcnew System::Windows::Forms::Label());
			this->timer = (gcnew System::Windows::Forms::Timer(this->components));
			this->panel6->SuspendLayout();
			this->door_pnl->SuspendLayout();
			this->card_reader_pnl->SuspendLayout();
			this->door_lock_pnl->SuspendLayout();
			this->panel2->SuspendLayout();
			this->panel1->SuspendLayout();
			this->panel3->SuspendLayout();
			this->SuspendLayout();
			// 
			// reset_btn
			// 
			this->reset_btn->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->reset_btn->Location = System::Drawing::Point(455, 409);
			this->reset_btn->Name = L"reset_btn";
			this->reset_btn->Size = System::Drawing::Size(344, 78);
			this->reset_btn->TabIndex = 16;
			this->reset_btn->Text = L"Reset";
			this->reset_btn->UseVisualStyleBackColor = true;
			this->reset_btn->Click += gcnew System::EventHandler(this, &Form1::reset_btn_Click);
			// 
			// card_btn
			// 
			this->card_btn->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->card_btn->Location = System::Drawing::Point(455, 241);
			this->card_btn->Name = L"card_btn";
			this->card_btn->Size = System::Drawing::Size(344, 78);
			this->card_btn->TabIndex = 15;
			this->card_btn->Text = L"Swipe Card";
			this->card_btn->UseVisualStyleBackColor = true;
			this->card_btn->Click += gcnew System::EventHandler(this, &Form1::card_btn_Click);
			// 
			// handle_btn
			// 
			this->handle_btn->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->handle_btn->Location = System::Drawing::Point(455, 325);
			this->handle_btn->Name = L"handle_btn";
			this->handle_btn->Size = System::Drawing::Size(344, 78);
			this->handle_btn->TabIndex = 14;
			this->handle_btn->Text = L"Door Handle";
			this->handle_btn->UseVisualStyleBackColor = true;
			this->handle_btn->Click += gcnew System::EventHandler(this, &Form1::handle_btn_Click);
			// 
			// panel6
			// 
			this->panel6->Controls->Add(this->label6);
			this->panel6->Controls->Add(this->general_message_txt);
			this->panel6->Location = System::Drawing::Point(-14, 503);
			this->panel6->Name = L"panel6";
			this->panel6->Size = System::Drawing::Size(815, 257);
			this->panel6->TabIndex = 13;
			this->panel6->TabStop = true;
			// 
			// label6
			// 
			this->label6->AutoSize = true;
			this->label6->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label6->Location = System::Drawing::Point(315, 18);
			this->label6->Name = L"label6";
			this->label6->Size = System::Drawing::Size(203, 29);
			this->label6->TabIndex = 6;
			this->label6->Text = L"Message Output";
			// 
			// general_message_txt
			// 
			this->general_message_txt->Location = System::Drawing::Point(120, 50);
			this->general_message_txt->Name = L"general_message_txt";
			this->general_message_txt->ReadOnly = true;
			this->general_message_txt->Size = System::Drawing::Size(543, 190);
			this->general_message_txt->TabIndex = 0;
			this->general_message_txt->Text = L"";
			// 
			// door_pnl
			// 
			this->door_pnl->BackColor = System::Drawing::Color::Red;
			this->door_pnl->Controls->Add(this->label5);
			this->door_pnl->Location = System::Drawing::Point(3, 29);
			this->door_pnl->Name = L"door_pnl";
			this->door_pnl->Size = System::Drawing::Size(259, 474);
			this->door_pnl->TabIndex = 12;
			// 
			// label5
			// 
			this->label5->AutoSize = true;
			this->label5->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label5->Location = System::Drawing::Point(88, 199);
			this->label5->Name = L"label5";
			this->label5->Size = System::Drawing::Size(70, 29);
			this->label5->TabIndex = 6;
			this->label5->Text = L"Door";
			// 
			// card_reader_pnl
			// 
			this->card_reader_pnl->BackColor = System::Drawing::Color::Green;
			this->card_reader_pnl->Controls->Add(this->label4);
			this->card_reader_pnl->Location = System::Drawing::Point(268, 241);
			this->card_reader_pnl->Name = L"card_reader_pnl";
			this->card_reader_pnl->Size = System::Drawing::Size(181, 78);
			this->card_reader_pnl->TabIndex = 3;
			// 
			// label4
			// 
			this->label4->AutoSize = true;
			this->label4->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label4->Location = System::Drawing::Point(20, 15);
			this->label4->Name = L"label4";
			this->label4->Size = System::Drawing::Size(162, 29);
			this->label4->TabIndex = 5;
			this->label4->Text = L"Card Reader";
			// 
			// door_lock_pnl
			// 
			this->door_lock_pnl->BackColor = System::Drawing::Color::Red;
			this->door_lock_pnl->Controls->Add(this->label3);
			this->door_lock_pnl->Location = System::Drawing::Point(268, 325);
			this->door_lock_pnl->Name = L"door_lock_pnl";
			this->door_lock_pnl->Size = System::Drawing::Size(181, 78);
			this->door_lock_pnl->TabIndex = 4;
			// 
			// label3
			// 
			this->label3->AutoSize = true;
			this->label3->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label3->Location = System::Drawing::Point(20, 25);
			this->label3->Name = L"label3";
			this->label3->Size = System::Drawing::Size(132, 29);
			this->label3->TabIndex = 4;
			this->label3->Text = L"Door Lock";
			// 
			// panel2
			// 
			this->panel2->Controls->Add(this->card_id_txt);
			this->panel2->Controls->Add(this->label2);
			this->panel2->Location = System::Drawing::Point(455, 178);
			this->panel2->Name = L"panel2";
			this->panel2->Size = System::Drawing::Size(346, 57);
			this->panel2->TabIndex = 11;
			// 
			// card_id_txt
			// 
			this->card_id_txt->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->card_id_txt->Location = System::Drawing::Point(145, 12);
			this->card_id_txt->Name = L"card_id_txt";
			this->card_id_txt->Size = System::Drawing::Size(174, 35);
			this->card_id_txt->TabIndex = 3;
			// 
			// label2
			// 
			this->label2->AutoSize = true;
			this->label2->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label2->Location = System::Drawing::Point(11, 12);
			this->label2->Name = L"label2";
			this->label2->Size = System::Drawing::Size(101, 29);
			this->label2->TabIndex = 1;
			this->label2->Text = L"Card ID";
			// 
			// panel1
			// 
			this->panel1->Controls->Add(this->door_id_txt);
			this->panel1->Controls->Add(this->label1);
			this->panel1->Location = System::Drawing::Point(455, 115);
			this->panel1->Name = L"panel1";
			this->panel1->Size = System::Drawing::Size(346, 57);
			this->panel1->TabIndex = 10;
			// 
			// door_id_txt
			// 
			this->door_id_txt->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->door_id_txt->Location = System::Drawing::Point(145, 10);
			this->door_id_txt->Name = L"door_id_txt";
			this->door_id_txt->Size = System::Drawing::Size(174, 35);
			this->door_id_txt->TabIndex = 2;
			// 
			// label1
			// 
			this->label1->AutoSize = true;
			this->label1->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label1->Location = System::Drawing::Point(9, 11);
			this->label1->Name = L"label1";
			this->label1->Size = System::Drawing::Size(102, 29);
			this->label1->TabIndex = 0;
			this->label1->Text = L"Door ID";
			// 
			// panel3
			// 
			this->panel3->Controls->Add(this->date_input);
			this->panel3->Controls->Add(this->label9);
			this->panel3->Controls->Add(this->time_input);
			this->panel3->Controls->Add(this->label8);
			this->panel3->Location = System::Drawing::Point(455, 29);
			this->panel3->Name = L"panel3";
			this->panel3->Size = System::Drawing::Size(346, 80);
			this->panel3->TabIndex = 17;
			// 
			// date_input
			// 
			this->date_input->CustomFormat = L"";
			this->date_input->Format = System::Windows::Forms::DateTimePickerFormat::Short;
			this->date_input->Location = System::Drawing::Point(196, 40);
			this->date_input->MaxDate = System::DateTime(2025, 1, 25, 23, 59, 59, 0);
			this->date_input->MinDate = System::DateTime(2000, 1, 1, 0, 0, 0, 0);
			this->date_input->Name = L"date_input";
			this->date_input->RightToLeft = System::Windows::Forms::RightToLeft::No;
			this->date_input->Size = System::Drawing::Size(138, 26);
			this->date_input->TabIndex = 3;
			this->date_input->Value = System::DateTime(2025, 1, 2, 16, 10, 6, 0);
			// 
			// label9
			// 
			this->label9->AutoSize = true;
			this->label9->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label9->Location = System::Drawing::Point(45, 37);
			this->label9->Name = L"label9";
			this->label9->Size = System::Drawing::Size(67, 29);
			this->label9->TabIndex = 2;
			this->label9->Text = L"Date";
			// 
			// time_input
			// 
			this->time_input->CustomFormat = L"";
			this->time_input->Format = System::Windows::Forms::DateTimePickerFormat::Time;
			this->time_input->Location = System::Drawing::Point(196, 3);
			this->time_input->MaxDate = System::DateTime(2025, 1, 25, 23, 59, 59, 0);
			this->time_input->MinDate = System::DateTime(2000, 1, 1, 0, 0, 0, 0);
			this->time_input->Name = L"time_input";
			this->time_input->Size = System::Drawing::Size(138, 26);
			this->time_input->TabIndex = 1;
			this->time_input->Value = System::DateTime(2025, 1, 2, 16, 10, 6, 0);
			// 
			// label8
			// 
			this->label8->AutoSize = true;
			this->label8->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 12, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label8->Location = System::Drawing::Point(45, 1);
			this->label8->Name = L"label8";
			this->label8->Size = System::Drawing::Size(73, 29);
			this->label8->TabIndex = 0;
			this->label8->Text = L"Time";
			// 
			// timer
			// 
			this->timer->Interval = 1000;
			this->timer->Tick += gcnew System::EventHandler(this, &Form1::timer_Tick);
			// 
			// Form1
			// 
			this->AutoScaleDimensions = System::Drawing::SizeF(9, 20);
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
			this->ClientSize = System::Drawing::Size(811, 772);
			this->Controls->Add(this->panel3);
			this->Controls->Add(this->door_lock_pnl);
			this->Controls->Add(this->card_reader_pnl);
			this->Controls->Add(this->reset_btn);
			this->Controls->Add(this->card_btn);
			this->Controls->Add(this->handle_btn);
			this->Controls->Add(this->panel6);
			this->Controls->Add(this->door_pnl);
			this->Controls->Add(this->panel2);
			this->Controls->Add(this->panel1);
			this->FormBorderStyle = System::Windows::Forms::FormBorderStyle::FixedSingle;
			this->MaximizeBox = false;
			this->Name = L"Form1";
			this->Text = L"A.C.E.S";
			this->panel6->ResumeLayout(false);
			this->panel6->PerformLayout();
			this->door_pnl->ResumeLayout(false);
			this->door_pnl->PerformLayout();
			this->card_reader_pnl->ResumeLayout(false);
			this->card_reader_pnl->PerformLayout();
			this->door_lock_pnl->ResumeLayout(false);
			this->door_lock_pnl->PerformLayout();
			this->panel2->ResumeLayout(false);
			this->panel2->PerformLayout();
			this->panel1->ResumeLayout(false);
			this->panel1->PerformLayout();
			this->panel3->ResumeLayout(false);
			this->panel3->PerformLayout();
			this->ResumeLayout(false);

		}

#pragma endregion
//Objects to use (Not working with return
		//Converters converter;
//Global variables
		bool door, door_lock;

//Events
	private: System::Void timer_Tick(System::Object^ sender, System::EventArgs^ e) {
		while(timer->Enabled) {

		}

	}

	private: Void card_btn_Click(Object^ sender, EventArgs^ e) {
		card_reader_pnl->BackColor.Blue;
		general_message("NEW ACCESS ATTEMPT");
		//Verify card
		int card_id = verify_card_input();
		//Verify door
		string door_id = verify_door_input();

		string time = convert_to_small_string(time_input->Text);

		string date = convert_to_small_string(date_input->Text);
		string converted_date = convert_date(date);

		if (card_id != 0 && door_id != "") {
			//Authhenticate card and door id
			bool authentication = database_authenticate(card_id, door_id);

			if (authentication) {
				//Authorisation of user
				bool authorisation = database_authorisation(card_id, door_id,time, converted_date);
				string decision;
				if (authorisation) {
					decision = "1";
				}
				else {
					decision = "0";
				}

				string log_message = database_log(card_id, door_id, time, converted_date, decision);
			}
		}
		card_reader_pnl->BackColor.Green;
	}

	private: Void handle_btn_Click(Object^ sender, EventArgs^ e) {

	}
	private: Void reset_btn_Click(Object^ sender, EventArgs^ e) {

	}
//Actions


		   
//Verification of inputs
	private: int verify_card_input() {
		int card_id = 0;
		try {
			card_id = Convert::ToInt32(card_id_txt->Text);
			general_message("Card ID Verified");
			if(card_id < 0) {
				card_id = 0;
			}
		}
		catch (FormatException^ e) {
			general_message("Enter Valid Card ID");
		}
		return card_id;
	}

	private: string verify_door_input() {

		string door_id = convert_to_small_string(door_id_txt->Text);
		if (door_id.empty()) {
			general_message("Enter Door ID");
			return "";
		}
		else {
			general_message("Door ID Verified");
			return door_id;
		}
	}

//Authentication of details
	public: bool database_authenticate(int card_id, string door_id) {
		sql::mysql::MySQL_Driver* driver;
		sql::Connection* con;
		driver = sql::mysql::get_mysql_driver_instance();
		con = driver->connect("localhost", "root", "");
		con->setSchema("door_cards");
		sql::Statement* stmt;
		stmt = con->createStatement();
		
		string query;
		string card_id_string;
		string door_id_query;
		
		sql::ResultSet* res;
		
		bool door = false;
		bool card = false;
	//Card Authentication
			card_id_string = to_string(card_id);
			query = "SELECT * FROM person WHERE CardID =" + card_id_string;
			res = stmt->executeQuery(query);
			if (!res->next()) {
				general_message("This is not an authentic Card ID");
			}
			else {
				general_message("Authentic Card ID");
				card = true;
			}
	//Door Authentication
			door_id_query = "'"+door_id+ "'";
			query = "SELECT * FROM room WHERE RoomID =" + door_id_query;
			res = stmt->executeQuery(query);

			if (!res->next()) {
				general_message("This is not an authentic Door ID");
			}
			else {
				general_message("Authentic Door ID");
				door = true;
			}
			delete res;
			
			if (door && card) {
				return true;
			}
			else {
				return false;
			}
		delete stmt;
		delete con; 
	}
		  //Authorisation of user
//Authentication of details
	public: bool database_authorisation(int card_id, string door_id, string time, string date) {
		//Variables for results and message:
		string person_date;
		string access_date;

		string person_state;

		list<string> rooms_allowed;
		list<string> start_times;
		list<string> end_times;

		string room_state;
		string room_type;

		int access_time;

		bool date_check=false;
		bool state_check = false;
		bool time_check = false;
		bool room_check = false;


		sql::mysql::MySQL_Driver* driver;
		sql::Connection* con;
		driver = sql::mysql::get_mysql_driver_instance();
		con = driver->connect("localhost", "root", "");
		con->setSchema("door_cards");
		sql::Statement* stmt;
		stmt = con->createStatement();
		sql::ResultSet* res;
		string query;
		
		string card_id_string = to_string(card_id);
		//Need STATE ALLOWED, TIMES ALLOWED, END DATE, ROOMS ALLOWED
		//End Date Data
		query = "SELECT person.CardID,person.EndDate FROM person WHERE CardID =" + card_id_string;

		res = stmt->executeQuery(query);
		
		if (!res->next()) {
			general_message("Person End Date not accessible");
		}
		else {
			person_date = res->getString("EndDate");
			access_date = date;
		}
		
		
		//State Data
		query = "SELECT person.CardID,person.RoleID,role.StateID FROM person INNER JOIN role ON person.RoleID=role.RoleID WHERE CardID =" + card_id_string;

		res = stmt->executeQuery(query);

		if (!res->next()) {
			general_message("Role State not accessible");
		}
		else {
			person_state = res->getString("StateID");
		}

		//Rooms Allowed Data
		query = "SELECT person.CardID,person.RoleID,rooms_allowed.RoomTypeID FROM person INNER JOIN rooms_allowed ON person.RoleID=rooms_allowed.RoleID WHERE CardID =" + card_id_string;
		
		res = stmt->executeQuery(query);
		if (!res->next()) {
			general_message("Rooms Allowed not accessible");
		}
		else {
			rooms_allowed.push_back(res->getString("RoomTypeID"));
			while (res->next()) {
			
				rooms_allowed.push_back(res->getString("RoomTypeID"));
			
			}
		}

		//Times Allowed Data
		query = "SELECT person.CardID,person.RoleID,role_times.StartTime,role_times.EndTime  FROM person INNER JOIN role_times ON person.RoleID=role_times.RoleID WHERE CardID =" + card_id_string;

		res = stmt->executeQuery(query);
		if (!res->next()) {
			general_message("Times Allowed not accessible");
		}
		else {
			start_times.push_back(res->getString("StartTime"));
			end_times.push_back(res->getString("EndTime"));
			while (res->next()) {
				start_times.push_back(res->getString("StartTime"));
				end_times.push_back(res->getString("EndTime"));
				
			}
		}

		//Door State and Type Data
		string door_id_query = "'" + door_id + "'";
		query = "SELECT * FROM room WHERE RoomID =" + door_id_query;
		res = stmt->executeQuery(query);

		if (!res->next()) {
			general_message("Door State not accessible");
		}
		else {
			room_state = res->getString("StateID");
			room_type = res->getString("RoomTypeID");
		}

		delete res;
		delete stmt;
		delete con;


	//Check Authorisation
		//Check state
		if (person_state == "A"|| room_state == person_state) {
			general_message("Authorised State");
			state_check = true;
		}
		else {
			general_message("Unauthorised State");
		}

		//Room Check
		for (string type : rooms_allowed) {
			if (type == room_type) {
				room_check = true;
			}
		}
		if (room_check) {
			general_message("Authorised Room Type");
		}
		else {
			general_message("Unauthorised Room Type");
		}
		
		//Date Check
		date_check = check_date(person_date,access_date);
		if (date_check) {
			general_message("Authorised Date");
		}
		else {
			general_message("Unauthorised Date");
		}
		
		//Time Check
		access_time = convert_time(time);
		for (int i = 0; i < start_times.size();i++) {
			list<string>::iterator it1 = start_times.begin();

			advance(it1, i);

			list<string>::iterator it2 = end_times.begin();
			
			advance(it2, i);

			int start_time = convert_time(*it1);
			int end_time = convert_time(*it2);

			if (access_time >= start_time && access_time <= end_time) {
				general_message("Authorised Time");
				time_check = true;
			}
			else {
				general_message("Unauthorised Time");
			}
		}
		
		if (date_check && state_check && time_check && room_check) {
			return true;
		}
		else {
			return false;
		}

		
	}

	private: string database_log(int card_id, string door_id, string time, string converted_date, string decision) {
		sql::mysql::MySQL_Driver* driver;
		sql::Connection* con;
		driver = sql::mysql::get_mysql_driver_instance();
		con = driver->connect("localhost", "root", "");
		con->setSchema("door_cards");
		sql::Statement* stmt;
		stmt = con->createStatement();
		sql::ResultSet* res;
		string query;
		string door_id_query;
		string time_query;
		string converted_date_query;
		string log_id;
		string log_id_query;
		//Check if room has a log for this date
		door_id_query = "'" + door_id + "'";
		converted_date_query = "'" + converted_date + "'";

		query = "SELECT * FROM  log WHERE RoomID ="+door_id_query+" AND Date ="+ converted_date_query;

		res = stmt->executeQuery(query);

		if (!res->next()) {
			general_message("New Log Required");

			//Create new log
			query = "INSERT INTO log (RoomID, Date) VALUES (" + door_id_query + "," + converted_date_query + ")";
	
				stmt->execute(query);
			
				general_message("Log Created");
			//Get LogID

			query = "SELECT * FROM  log WHERE RoomID =" + door_id_query + " AND Date =" + converted_date_query;
			res = stmt->executeQuery(query);

		if (!res->next()) {
			general_message("Log ID does not exist");
		}
		else {
			log_id = res->getString("LogID");
		}
		}
		else {
			//Add to existing log
			general_message("Log Exists");
			//Get LogID
			log_id = res->getString("LogID");

		}
		//Create Log Details

		string card_id_string = to_string(card_id);

		query = "INSERT INTO log_details (LogID, CardID,Time,Decision) VALUES ('" + log_id + "','" + card_id_string + "','" + time+ "','" + decision + "')";

		try {
			stmt->execute(query);
			general_message("Details Logged");
		}
		catch (sql::SQLException& e) {
			general_message("Log inaccessible");
		}
		
		
		delete res;
		delete stmt;
		delete con;

		return "";	
	}



	private: bool check_date(string person_date,string access_date) {
		//Check year
		string person_year;
		person_year[0] = person_date[0];
		person_year[1] = person_date[1];
		person_year[2] = person_date[2];
		person_year[3] = person_date[3];

		string access_year;
		access_year[0] = access_date[0];
		access_year[1] = access_date[1];
		access_year[2] = access_date[2];
		access_year[3] = access_date[3];

		int p_year = stoi(person_year);
		int a_year = stoi(access_year);
		if (p_year > a_year) {
			return true;
		}
		else if (p_year == a_year) {
			//Check month
			string person_month;

			person_month[0] = person_date[5];
			person_month[1] = person_date[6];

			string access_month;

			access_month[0] = access_date[5];
			access_month[1] = access_date[6];

			int p_month = stoi(person_month);
			int a_month = stoi(access_month);

			if (p_month > a_month) {
				return true;
			}
			else if (p_month == a_month) {
				//Check month
				string person_day;

				person_day[0] = person_date[8];
				person_day[1] = person_date[9];

				string access_day;

				access_day[0] = access_date[8];
				access_day[1] = access_date[9];

				int p_day = stoi(person_day);
				int a_day = stoi(access_day);
				if (p_day > a_day) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}



		  //Output Messages
	private: Void general_message(String^ message) {
		general_message_txt->Text += message + "\n";
	}


//Converters
	//Convert time format
	private: int convert_time(string time) {

		string string_time;

		string_time[0] = time[0];
		string_time[1] = time[1];
		string_time[2] = time[3];
		string_time[3] = time[4];
		string_time[4] = time[6];
		string_time[5] = time[7];

		int int_time = stoi(string_time);

		return int_time;

	}
	//Converting string to String^
	String^ convert_to_big_string(string unconverted_string) {
		String^ return_big_string = gcnew System::String(unconverted_string.c_str());
		return return_big_string;
	}
	//Converting String^ to string
	string convert_to_small_string(String^ unconverted_string) {
		System::IntPtr pointer = Marshal::StringToHGlobalAnsi(unconverted_string);
		char* charPointer = reinterpret_cast<char*>(pointer.ToPointer());
		std::string return_small_string(charPointer, unconverted_string->Length);
		Marshal::FreeHGlobal(pointer);
		return return_small_string;
	}

	//Converting dd/mm/yyyy to yyyy-mm-dd
	string convert_date(string date_to_convert) {

		string dd, mm, yyyy;

		dd[0] = date_to_convert[0];
		dd[1] = date_to_convert[1];
		String^ DD = convert_to_big_string(dd);

		mm[0] = date_to_convert[3];
		mm[1] = date_to_convert[4];
			   String^ MM = convert_to_big_string(mm);

		yyyy[0] = date_to_convert[6];
		yyyy[1] = date_to_convert[7];
		yyyy[2] = date_to_convert[8];
		yyyy[3] = date_to_convert[9];
		String^ YYYY = convert_to_big_string(yyyy);


		//Wound't concantenate when string
		String^ date_String = YYYY +"-" + MM + "-" + DD;
		string date_string = convert_to_small_string(date_String);

		return date_string;
	}
};
}
