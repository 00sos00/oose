#include <iostream>
using namespace std;

class Database {
private:
    static Database* instance;

    Database() {
        cout << "Database initialized!" << endl;
    }

public:
    static Database& getInstance() {
        if (instance == nullptr)
            instance = new Database();
        return *instance;
    }
};

Database* Database::instance = nullptr;

int main() {
    Database& db1 = Database::getInstance();
    Database& db2 = Database::getInstance();

    cout << "db1 address: " << &db1 << endl;
    cout << "db2 address: " << &db2 << endl;

    if (&db1 == &db2) {
        cout << "Both instances are the same!" << endl;
    } else {
        cout << "Instances are different!" << endl;
    }

    return 0;
}
